<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ruche;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recolte>
 */
class RecolteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'miel' => $this->faker->randomFloat(2, 0, 50),
            'pollen' =>$this->faker->randomFloat(2, 0, 5),
            'propolis' =>$this->faker->randomFloat(2, 0, 5),
            'gelee_royale' =>$this->faker->randomFloat(2, 0, 3),
        ];
    }
}
