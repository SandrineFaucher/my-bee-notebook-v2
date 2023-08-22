<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recolte extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ruche_id',
        'miel',
        'pollen',
        'propolis',
        'gelee_royale',
    ];


    // nom de la fonction au pluriel car une récolte est associée à plusieurs ruches
    // cardinalité 1,n
    public function ruches(){
        return $this->hasMany(Ruche::class);
    }
}
