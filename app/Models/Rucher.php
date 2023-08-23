<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rucher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'adresse_id',
        'nom_rucher',
        'nombre_ruches',
        'environnement',
        ];


    // nom de la fonction au pluriel car un rucher peut posséder plusieurs ruches
    // cardinalités 1,n
    public function ruches(){
        return $this->hasMany(Ruche::class);
    }

    //nom de la fonction au singulier car un rucher peut être associé à un seul user
    // cardinalité 1,1
    public function user(){
        return $this->belongsTo(User::class);
    }

    // nom au singulier car un rucher peut être associé à une seule adresse
    // cardinalité 1,1
    public function adresse(){
        return $this->belongsTo(Adresse::class);
    }

            
}
