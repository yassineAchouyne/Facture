<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('users')->pluck('id');
        DB::table('clients')->insert([
            'prenom' => fake()->lastName(),
            'nom' => fake()->firstName(),
            'email' => fake()->email(),
            'adresse' => fake()->address(),
            'codePostal' => fake()->postcode(),
            'ville' => fake()->city(),
            'pays' => fake()->country(),
            'tel' => fake()->phoneNumber(),
            'tel' => fake()->phoneNumber(),
            'id_user' => 10
        ]);
    }
}
