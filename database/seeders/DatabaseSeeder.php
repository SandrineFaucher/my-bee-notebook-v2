<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            AdresseSeeder::class,
            RucherSeeder::class,
            RucheSeeder::class,
            VisiteSeeder::class,         
            RecolteSeeder::class,
            RuchesRecoltesSeeder::class,
        ]);
    }
}
