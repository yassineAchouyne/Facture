<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = DB::table('users')->pluck('id');
        $idc = DB::table('clients')->pluck('id_client');
        DB::table('factures')->insert([
            'dateEmission' => fake()->date(),
            'dateFin' => fake()->date(),
            'quantite' => random_int(10,50),
            'prixHT' => random_int(50,200),
            'Description' => fake()->slug(),
            'modePayment' => "PayPal",
            'id_client' => fake()->randomElement($idc),
            'id_user' => fake()->randomElement($id)
        ]);
    }
}
