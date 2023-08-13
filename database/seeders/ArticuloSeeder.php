<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articulos')->insert([
            'art_numero' => 1,
            'art_descripcion' => 'Formación Profesional integral',
            'cap_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 2,
            'art_descripcion' => 'Comunidad Educativa SENA',
            'cap_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 3,
            'art_descripcion' => 'Aprendiz SENA',
            'cap_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 4,
            'art_descripcion' => 'Cumplimiento de Principios y Valores',
            'cap_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 5,
            'art_descripcion' => 'Centros de Convivencia',
            'cap_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 6,
            'art_descripcion' => 'Alcance',
            'cap_id' => 1,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 7,
            'art_descripcion' => 'Derechos del Aprendiz SENA',
            'cap_id' => 2,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 8,
            'art_descripcion' => 'Deberes del Aprendiz SENA',
            'cap_id' => 3,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 9,
            'art_descripcion' => 'Prohibiciones',
            'cap_id' => 3,
        ]);
        DB::table('articulos')->insert([
            'art_numero' => 10,
            'art_descripcion' => 'Ingreso',
            'cap_id' => 4,
        ]);
    }
}