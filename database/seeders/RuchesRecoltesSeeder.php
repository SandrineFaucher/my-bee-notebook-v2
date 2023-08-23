<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruche;
use Illuminate\Support\Facades\DB;

class RuchesRecoltesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <16; $i++){
            DB::table('ruches_recoltes')->insert([
                'ruche_id' => rand(1 , Ruche::count()),
                'recolte_id' => $i,
            ]);
            }
    }
}
