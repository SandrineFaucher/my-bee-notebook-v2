<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruche extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rucher_id',
        'nom_ruche',
        'numero',
        'espece',
        'provenance',
        'lignee_reine',
        'nombre_cadres',
    ];


    // nom de la fonction au singulier car une ruche est associé à un rucher
    // cardinalité 1,1
    public function rucher(){
        return $this->belongsTo(Rucher::class);
    }

    // nom de la fonction au pluriel car une ruche peut être associée à aucune ou plusieurs récoltes
    // cardinalité 0,n
    public function recoltes(){
        return $this->hasMany(Recolte::class);
    }

    // nom de la fonction au pluriel car une ruche peut être associée à aucune ou plusieurs visites
    // cardinalité 0,n
    public function visites(){
        return $this->hasMany(Visite::class);
    }
}
