<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Form_jiridique;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


include "php/function.php";


class PdfController extends Controller
{
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


    public function generatePDF($id)

    {
        $user = auth()->user();
        $facture = Facture::find($id);
        $client = $facture->client;
        $total = $this->totalHT($facture);
        $societe = Form_jiridique::find($user->id);
        // return $societe->logo;
        $data = [
            'facture' => $facture,
            'client' => $client,
            'user' => $user,
            'logo' =>  'src="../../storage/logo/' . $societe->logo . '"',
            'int2str' => ucfirst(int2str($total)),
            'societe' => $societe,
            'total' => $total,

        ];
        // return $data['logo'];

        if ($user->societe) {
            $pdf = Pdf::loadView('pdfSociete', $data);
        } else   $pdf = Pdf::loadView('pdfAutoAntre', $data);

        $name = $client->prenom . $client->nom . $facture->id_facture . '.pdf';
        $pdf->save('storage/pdf/'.$name);
        // Storage::disk('public')->put('pdf/'.$name, file_get_contents($name));

        $facture->pdf = $name; 
        $facture->save();
        return redirect('/factures');
       
    }
}
