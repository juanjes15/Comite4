<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AprendizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('aprendizs')->insert([
                'apr_identificacion' => fake()->randomNumber(9, true),
                'apr_nombres' => fake()->firstName(),
                'apr_apellidos' => fake()->lastName(),
                'apr_email' => fake()->email(),
                'apr_telefono' => fake()->phoneNumber(),
                'apr_direccion' => fake()->address(),
                'apr_fechaNacimiento' => fake()->date(),
                'fic_id' => fake()->numberBetween(1, 10),
            ]);
        }
    }
}