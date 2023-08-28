<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ruche;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visite>
 */
class VisiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ruche_id' =>rand(1, Ruche::count()),
            'nombre_cadres_abeilles' =>$this->faker->numberBetween(0,12),
            'nombre_cadres_couvain' =>$this->faker->numberBetween(0,12),
            'nombre_cadres_miel' =>$this->faker->numberBetween(0,12),
            'nombre_hausses' =>$this->faker->numberBetween(0,5),
            'reine_vue' =>$this->faker->randomElement(['oui','non']),
            'cellules_royales' =>$this->faker->numberBetween(0,20),
            'ruche_orpheline' =>$this->faker->randomElement(['oui', 'non']),
            'essaimage' =>$this->faker->randomElement(['pas de risque', 'risque élevé', 'a essaimé']),
            'nourrissement' =>$this->faker->randomElement(['candi', 'sirop', 'miel']),
            'traitement' =>$this->faker->randomElement(['bandelette anti-varoa', 'acide oxalique']),
            'grille_reine' =>$this->faker->boolean(),
            'chasse_abeilles' =>$this->faker->boolean(),
            'grille_propolis' =>$this->faker->numberBetween(0,5),
            'date_visite'=>$this->faker->dateTimeBetween('-3 month'), 
            'force' =>$this->faker->numberBetween(0,10),
            'commentaire' =>$this->faker->paragraph(),
        ];
    }
}
