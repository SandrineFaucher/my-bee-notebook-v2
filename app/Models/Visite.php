<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    // nom de la fonction au singulier car une visite est associée à une ruche
    // cardinalité 1,1
    public function Ruche(){
        return $this->belongsTo(Ruche::class);
    }

    // nom de la fonction au singulier car plusieurs visites sont associées à un registre d'elevage
    // cardinalité 1,n
    public function Registre_elevage(){
        return $this->hasMany(Registre_elevage::class);
    }

}
