<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rucher;
use Illuminate\Support\Facades\DB;

class RucherRecolteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <16; $i++){
            DB::table('ruchers_recolte')->insert([
                'rucher_id' => rand(1 , Rucher::count()),
                'recolte_id' => $i,
            ]);
            }
    }
}
