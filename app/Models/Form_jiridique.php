<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form_jiridique extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable = ['nomSociete','adresse','codePostal','ville','RC','pays','website','IF','patent','cnss','ICE','tel','logo'];
}
