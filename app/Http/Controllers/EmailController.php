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
    public function index(Request $request)
    {
        
        $user = auth()->user();
        $facture = Facture::find($request->id);
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
            'client' => $client->nom ." ".$client->prenom,
            'msg' => $request->message,
        ];
        Mail::send('emails.testMail', $testMailData, function ($message) use ($pdf,$client,$facture) {
            $message->to($client->email)
                ->subject('Factura.ma')
                ->attachData($pdf->output(),$client->prenom.$client->nom.$facture->id_facture.'.pdf');
        });

        return redirect()->back()->with('status',"Succès! Email a été envoyé avec succès.");

    }

    public function contact(Request $request){

        $contact = [
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->phone,
            'msg' => $request->message,
            "date" => date("Y-m-d h:i:sa"),
        ];
        // return $contact;
        Mail::send('emails.contact', $contact, function ($msg) use($request) {
            $msg->to("yachouyne@gmail.com")
                ->subject("Lettre de".$request->name);
        });
        return redirect()->back()->with('status',"Succès! Message a été envoyé avec succès.");
    }
}
