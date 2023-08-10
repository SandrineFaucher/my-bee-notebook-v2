<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rucher extends Model
{
    use HasFactory;

    // nom de la fonction au pluriel car un rucher peut posséder plusieurs ruches
    // cardinalités 1,n
    public function Ruches(){
        return $this->hasMany(Ruche::class);
    }

    //nom de la fonction au singulier car un rucher peut être associé à un seul user
    // cardinalité 1,1
    public function User(){
        return $this->belongsTo(User::class);
    }

    // nom au singulier car un rucher peut être associé à une seule adresse
    // cardinalité 1,1
    public function Adresse(){
        return $this->belongsTo(Adresse::class);
    }

    // nom au singulier car 0 ou plusieurs ruchers peuvent être associés à un registre d'élevage
    // cardinalité 0,n
    public function Registre_elevage(){
        return $this->hasMany(Registre_elevage::class);
    }

    
}
