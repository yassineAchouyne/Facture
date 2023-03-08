<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $primaryKey="id_facture";
    protected $fillable = ['dateEmission','dateFin','quantite','prixHT','modePayment','tva'];

    public function client(){
        return $this->belongsTo(Client::class,'id_client');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_client');
    }

}
