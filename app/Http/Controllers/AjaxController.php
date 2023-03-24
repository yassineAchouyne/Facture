<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    function action(Request $request)
    {
            $output = '';
            $query = $request->get('query');

            if ($query == "payer") {
                $val = DB::table('factures')
                        ->where('id_user', auth()->user()->id)
                        ->where('statut', 'payer')
                        ->orderBy('id_facture', 'desc')
                        ->get();
                $nom = $query;
            }elseif ($query == "nonpayer") {
                $val = DB::table('factures')
                    ->where('id_user', auth()->user()->id)
                    ->where('statut', 'nonpayer')
                    ->orderBy('id_facture', 'desc')
                    ->get();
                $nom = $query;
            } elseif ($query == "perimes") {
                $val = DB::table('factures')
                    ->where('id_user', auth()->user()->id)
                    ->where('dateFin', "<", date("Y-m-d"))
                    ->orderBy('id_facture', 'desc')
                    ->get();
                $nom = "périmés";
            } else{
                $val = DB::table('factures')
                    ->where('id_user', auth()->user()->id)
                    ->orderBy('id_facture', 'desc')
                    ->get();
                    $nom = "";
            }

            $total_row = $val->count();
            if ($total_row > 0) {
                foreach ($val as $row) {
                    $output .= '
                    <tr>
                    <td>F' . $row->nbr_facture . '</td>
                    <td>' . $row->modePayment . '</td>
                    <td>' . $this->totalHT($row). ' DH</td>
                    <td>' . $row->dateFin . '</td>
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
}
