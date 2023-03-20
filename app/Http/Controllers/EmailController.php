<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Mail\SendMail;
use App\Models\Facture;
use App\Models\Form_jiridique;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

include "php/function.php";

class EmailController extends Controller
{
    public function index($id)
    {
       

        $user = auth()->user();
        $facture = Facture::find($id);
        $client = $facture->client;
        $total = $this->totalHT($facture);
        $societe = Form_jiridique::find($user->id);
        
        $data = [
            'facture' => $facture,
            'client' => $client,
            'user' => $user,
            'logo' =>  'src="../../storage/logo/' . $societe->logo . '"',
            'int2str' => ucfirst(int2str($total)),
            'societe' => $societe,
            'total' => $total,

        ];

        if ($user->societe) {
            $pdf = PDF::loadView('pdfSociete', $data);
        } else {
            $pdf = PDF::loadView('pdfAutoAntre', $data);
        }
        $testMailData = [
            'title' => 'Facture numéro  ' . $facture->nbr_facture,
        ];
        Mail::send('emails.testMail', $testMailData, function ($message) use ($pdf,$client,$facture) {
            $message->to($client->email)
                ->subject('Factura')
                ->attachData($pdf->output(),$client->prenom.$client->nom.$facture->id_facture.'.pdf');
        });

        return redirect()->back()->with('status',"Succès! Email a été envoyé avec succès.");

    }
}
