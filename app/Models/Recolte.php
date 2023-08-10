<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recolte extends Model
{
    use HasFactory;

    // nom de la fonction au pluriel car une récolte est associée à plusieurs ruches
    // cardinalité 1,n
    public function Ruches(){
        return $this->hasMany(Ruche::class);
    }
}
