<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey="id_client";
    protected $fillable = ['prenom','nom','email','adresse','codePostal','ville','pays','website','tel',];

    public function user(){
        return $this->hasMany(User::class,'id');
    }
    public function facture(){
        return $this->belongsTo(Facture::class,'id_client');
    }
}
