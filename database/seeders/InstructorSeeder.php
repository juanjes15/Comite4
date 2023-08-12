<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('instructors')->insert([
                'ins_identificacion' => fake()->randomNumber(9, true),
                'ins_nombres' => fake()->firstName(),
                'ins_apellidos' => fake()->lastName(),
                'ins_email' => fake()->email(),
                'ins_telefono' => fake()->phoneNumber(),
            ]);
        }
    }
}