<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rucher;


class RegistreElevageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <16; $i++){
            DB::table('registre_elevage')->insert([
                'rucher_id' => rand(1 , Rucher::count()),
                'visite_id' => $i,
            ]);
            }
    }
}