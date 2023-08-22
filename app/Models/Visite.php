<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visite extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ruche_id',
        'nombre_cadres_abeilles',
        'nombre_cadres_couvain',
        'nombre_cadres_miel',
        'nombre_hausses',
        'reine_vue',
        'cellules_royales',
        'ruche_orpheline',
        'essaimage',
        'nourrissement',
        'traitement',
        'grille_reine',
        'chasse_abeilles',
        'grille_propolis',
        'date_visite',
        'force',
        'commentaire',
    ];


    // nom de la fonction au singulier car une visite est associée à une ruche
    // cardinalité 1,1
    public function ruche(){
        return $this->belongsTo(Ruche::class);
    }

    // nom de la fonction au singulier car plusieurs visites sont associées à un registre d'elevage
    // cardinalité 1,n
    public function ruchers(){
        return $this->belongsToMany(Rucher::class, 'registre_elevage');
    }

}
