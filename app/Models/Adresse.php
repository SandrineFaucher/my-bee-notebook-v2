<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'adresse',
        'code_postal',
        'ville',
        'napi',
    ];


    //nom au singulier car une adresse peut être associée qu'à un user
    //cardinalité 1,1
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // nom au singulier car un rucher n'a qu'une adresse
    public function rucher()
    {
        return $this->hasOne(Rucher::class);
    }
}
