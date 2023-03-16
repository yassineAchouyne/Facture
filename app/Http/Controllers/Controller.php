<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Facture;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function dashboard(){
        if(empty(Auth::user())){
            return view('index');
        } else {
            $client = DB::table("clients")->where("id_user",Auth::user()->id)->get();
            $facture = DB::table('factures')->where("id_user",Auth::user()->id)->get();
            $chiffreAfire= $facture->where("statut","payer");
            $total = 0;
            $tva=0;
            $Fpayer =count( $facture->where("statut","payer"));
            $Fnonpayer =count( $facture->where("statut","nonpayer"));
            foreach ($chiffreAfire as $chiffre){
                $total =$total+$this->totalHT($chiffre) ;
            }
            foreach ($facture as $chiffre){
                $tva =$total+$this->totalHT($chiffre) ;
            }

            $data=[
                'nbrClient' => count($client),
                'nbrFacture' => count($facture),
                'total' => $total,
                'tva' => $tva,
                'Fpayer' => $Fpayer,
                'Fnonpayer' => $Fnonpayer,
            ];
            return view('Admin.dashboard',$data);
        }

    }
    public function totalHT($f)
    {
        $qtt = json_decode($f->quantite, true);
        $pr = json_decode($f->prixHT, true);
        
        $total = 0;
        foreach ($qtt as $i => $q) {
            $total = $total + $q * $pr[$i];
        }
        return $total;
    }

    public function ChangeStatut ($id){
        $facture = Facture::find($id);
        $facture->statut="payer";
        $facture->update();
        return redirect("/factures/$id");
    }

    public function Envoyer_ClientAfacture($idc){
        $clients = DB::table("clients")->where("id_user", Auth::user()->id)->get();
        return view("admin.ajouterfacture", compact("clients","idc"));
    }

}
