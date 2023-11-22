<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            AdminUserSeeder::class,
            ProgramaSeeder::class,
            InstructorSeeder::class,
            FichaSeeder::class,
            AprendizSeeder::class,
            CapituloSeeder::class,
            ArticuloSeeder::class,
            NumeralSeeder::class,
        ]);

        //Creación de usuario aprendiz
        User::create([
            'name' => 'Aprendiz #1',
            'email' => 'aprendiz@aprendiz.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Aprendiz',
            'apr_id' => 1,
        ]);

        //Creación de usuario instructor
        User::create([
            'name' => 'Instructor #1',
            'email' => 'instructor@instructor.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Instructor',
            'ins_id' => 1,
        ]);

        //Creación de usuario gestor
        User::create([
            'name' => 'Gestor de Comités',
            'email' => 'gestor@gestor.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'rol' => 'Gestor_Comite',
        ]);

        
    }
}