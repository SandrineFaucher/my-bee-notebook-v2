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
    // Afin de récupérer la relation récoltes avec ruches 
    protected $with = ['recoltes','rucher'];

    // nom de la fonction au singulier car une ruche est associé à un rucher
    // cardinalité 1,1
    public function rucher(){
        return $this->belongsTo(Rucher::class);
    }

    
    // nom de la fonction au pluriel car une ruche peut être associée à  plusieurs visites
    // cardinalité 0,n
    public function visites(){
        return $this->hasMany(Visite::class);
    }

    // nom au pluriel car plusieurs ruches sont associées à plusieurs récoltes
    //0,n
    public function recoltes(){
        return $this->belongsToMany(Recolte::class, 'ruches_recoltes');
    }
}
