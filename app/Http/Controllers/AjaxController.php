<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    function action(Request $request)
    {
        if($request->ajax())
        {
            $output = '';
            $query = $request->get('query');
            if($query == 'nonpayer' || $query=="payer") {
                $data = DB::table('factures')
                    ->where('id_user',auth()->user()->id)
                    ->where('statut',$query)
                    ->orderBy('id_facture','desc')
                    ->get(); 
                    $nom=$query;
            }elseif($query="perimes"){
                $data = DB::table('factures')
                ->where('id_user',auth()->user()->id)
                ->where('dateFin',"<",date("Y-m-d"))
                ->orderBy('id_facture', 'desc')
                ->get(); 
                $nom="périmés";
            }else {
                $data = DB::table('factures')
                    ->orderBy('id_facture', 'desc')
                    ->get();
            }
             
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row){
                    $output .= '
                    <tr>
                    <td>F'.$row->id_facture.'</td>
                    <td>'.$row->modePayment.'</td>
                    <td>'. $row->quantite* $row->prixHT*(1+$row->tva/100) .' DH</td>
                    <td>'.$row->dateFin.'</td>
                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="4">Aucune donnée disponible</td>
                </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row,
                'nom_data'  => $nom,
            );
            echo json_encode($data);
        }
    }
}
