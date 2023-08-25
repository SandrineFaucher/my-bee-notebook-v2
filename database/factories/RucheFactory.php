<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Rucher;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruche>
 */
class RucheFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rucher_id' => rand(1, Rucher::count()),
            'nom_ruche' =>$this->faker->word(),
            'numero' =>$this->faker->randomNumber(3, true),
            'espece' =>$this->faker->randomElement(['Buckfast','Abeilles noires','Abeilles hybrides']),
            'provenance' =>$this->faker->city(),
            'lignee_reine' =>$this->faker->name(),
            'nombre_cadres' =>$this->faker->numberBetween(0,12),
        ];
    }
}
