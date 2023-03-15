<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Form_jiridique;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use PDF;

class PdfController extends Controller
{
    public function totalHT($f){
        $qtt = json_decode($f->quantite, true);
        $pr = json_decode($f->prixHT, true);
        $total = 0;
        foreach ($qtt as $i=>$q) {
            $total = $total + $q * $pr[$i];
        }
        return $total;
    }


    public function generatePDF($id)

    {
        $user = auth()->user();
        $facture = Facture::find($id);
        $client = $facture->client;
        $total = $this->totalHT($facture) ;
        $societe= Form_jiridique::find($user->id) ;
        $data = [
            'facture' => $facture,
            'client' => $client,
            'user' => $user,
            //'logo'=> $user->societe=null ?? 'src="../../storage/logo/'.$societe->logo .'"',
            'int2str' =>ucfirst($this->int2str($total)),
            'societe' => $societe,
            'total' => $total,
            
        ];
        // return $data['logo'];
        
        if($user->societe){
            $pdf = PDF::loadView('pdfSociete', $data);
        }else   $pdf = PDF::loadView('pdfAutoAntre', $data);

        
        return $pdf->stream($client->prenom.$client->nom.$facture->id_facture.'.pdf');
       
    }

    public function int2str($a)
    {
        $a=intval($a);
    $convert = explode('.',$a);
    if (isset($convert[1]) && $convert[1]!=''){
    return $this->int2str($convert[0]).'DH'.' et '.$this->int2str($convert[1]).'Centimes' ;
    }
    if ($a<0) return 'moins '.$this->int2str(-$a);
    if ($a<17){
    switch ($a){
    case 0: return 'zero';
    case 1: return 'un';
    case 2: return 'deux';
    case 3: return 'trois';
    case 4: return 'quatre';
    case 5: return 'cinq';
    case 6: return 'six';
    case 7: return 'sept';
    case 8: return 'huit';
    case 9: return 'neuf';
    case 10: return 'dix';
    case 11: return 'onze';
    case 12: return 'douze';
    case 13: return 'treize';
    case 14: return 'quatorze';
    case 15: return 'quinze';
    case 16: return 'seize';
    }
    } else if ($a<20){
    return 'dix-'.$this->int2str($a-10);
    } else if ($a<100){
    if ($a%10==0){
    switch ($a){
    case 20: return 'vingt';
    case 30: return 'trente';
    case 40: return 'quarante';
    case 50: return 'cinquante';
    case 60: return 'soixante';
    case 70: return 'soixante-dix';
    case 80: return 'quatre-vingt';
    case 90: return 'quatre-vingt-dix';
    }
    } elseif (substr($a, -1)==1){
    if( ((int)($a/10)*10)<70 ){
    return $this->int2str((int)($a/10)*10).'-et-un';
    } elseif ($a==71) {
    return 'soixante-et-onze';
    } elseif ($a==81) {
    return 'quatre-vingt-un';
    } elseif ($a==91) {
    return 'quatre-vingt-onze';
    }
    } elseif ($a<70){
    return $this->int2str($a-$a%10).'-'.$this->int2str($a%10);
    } elseif ($a<80){
    return $this->int2str(60).'-'.$this->int2str($a%20);
    } else{
    return $this->int2str(80).'-'.$this->int2str($a%20);
    }
    } else if ($a==100){
    return 'cent';
    } else if ($a<200){
    return $this->int2str(100).' '.$this->int2str($a%100);
    } else if ($a<1000){
    return $this->int2str((int)($a/100)).' '.$this->int2str(100).' '.$this->int2str($a%100);
    } else if ($a==1000){
    return 'mille';
    } else if ($a<2000){
    return $this->int2str(1000).' '.$this->int2str($a%1000).' ';
    } else if ($a<1000000){
    return $this->int2str((int)($a/1000)).' '.$this->int2str(1000).' '.$this->int2str($a%1000);
    }
    else if ($a==1000000){
    return 'millions';
    }
    else if ($a<2000000){
    return $this->int2str(1000000).' '.$this->int2str($a%1000000).' ';
    }
    else if ($a<1000000000){
    return $this->int2str((int)($a/1000000)).' '.$this->int2str(1000000).' '.$this->int2str($a%1000000);
    }
    }
}
