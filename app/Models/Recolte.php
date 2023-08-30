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
        'user_id'
    ];


    

    // nom au pluriel car plusieurs ruches sont associées à plusieurs récoltes
    public function ruches(){
        return $this->belongsToMany(Ruche::class, 'ruches_recoltes');
    }

    // nom au singulier car un seul user associé à la récolte
    public function user(){
        return $this->belongsTo(User::class);
    }
 
}
