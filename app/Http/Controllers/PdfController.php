<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    public function generatePDF()

    {
        ini_set('max_execution_time', 180);
        $user = auth()->user();
        $facture = Facture::find(1);
        $client = $facture->client;
        $data = [
            'facture' => $facture,
            'client' => $client,
            'user' => $user,
        ];
        
        $pdf = PDF::loadView('myPDF', $data);

        return $pdf->download($client->nom.$facture->id_facture.'.pdf');
        // return view("myPDF",$data);
    }
}
