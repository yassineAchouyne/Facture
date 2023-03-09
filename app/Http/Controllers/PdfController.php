<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use PDF;
class PdfController extends Controller
{
    public function generatePDF()

    {
        $data="";
          
        // $pdf = PDF::loadView('myPDF', $data);
    
        // return $pdf->download('name.pdf');
        return view("myPDF");
    }

}
