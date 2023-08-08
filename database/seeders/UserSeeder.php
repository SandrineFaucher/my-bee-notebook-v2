<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //création de l'administrateur
        User::create([
            'nom' => 'admin',
            'prenom' => 'admin',
            'password' => Hash::make('Dev2023!'),
            'email' => 'admin@admin.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 2,
        ]);

        //création d'un utilisateur de test
        User::create ([
            'nom' => 'utilisateur',
            'prenom' => 'utilisateur',
            'password' => Hash::make('Dev2023!'),
            'email' => 'utilisateur@test.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1,
        ]);

        //création de 8 users aléatoires
        User::factory(8)->create();
    }
}
