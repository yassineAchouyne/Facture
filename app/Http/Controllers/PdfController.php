<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    public function generatePDF($id)

    {
        ini_set('max_execution_time', 180);
        $user = auth()->user();
        $facture = Facture::find($id);
        $client = $facture->client;
        $data = [
            'facture' => $facture,
            'client' => $client,
            'user' => $user,
            'logo'=> public_path("/storage/logo/".$client->logo)
        ];
        
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download($client->prenom.$client->nom.$facture->id_facture.'.pdf');
    }
}
