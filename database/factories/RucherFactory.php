<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Adresse;
use App\Models\Ruche;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rucher>
 */
class RucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => rand(1, User::count()),
            'adresse_id' => rand(1, Adresse::count()),
            'nom_rucher' => $this->faker->word(),
            'environnement'=>$this->faker->words(2, true), 
        ];
    }
}
