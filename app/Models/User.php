<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //nom au pluriel car un user peut avoir plusieurs adresses (adresse domicile + adresses des ruchers)
    // cardinalité 0,n
    public function adresses()
    {
        return $this->hasMany(Adresse::class);
    }

    //nom au pluriel car un user peut avoir plusieurs ruchers
    // cardinalité 0,n
    public function ruchers()
    {
        return $this->hasMany(Rucher::class);
    }

    // nom au pluriel un user peut avoir plusieurs récoltes 0,n
    public function recoltes(){
        return $this->hasMany(Recolte::class);
    }


    //nom de la fonction au singulier car 1 seul rôle en relation
    // cardinalité 1,1
    public function role()
    {
        return $this->belongsTo(Role::class);
    }  
    
    public function isAdmin()
    {
        //return $this->role == "admin";
        return $this->role_id == 2;
    }



}
