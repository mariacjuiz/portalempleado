<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //CREAR USUARIOS
         echo 'Crear MI USUARIO ---------';
         User::factory()->create([
             'cif' => '53303160Q',
             'name' => 'María Castro Juíz',
             'email' => 'mariacjuiz@gmail.com',
             'email_verified_at' => now(),
             'password' => '$2y$10$qNoMoGWj37xKfmcGo1Q.0elmHKxFidM.ogDuuV86w899lYfzA5TkO', // password
             'adress' => 'Travesía de Sabón, 63',
             'phone' => '679109615',
             'photo' => 'uploads/chica1.jpg',
             'department' => '1',
             'is_admin' => '1',
             'created_at' => now(),
         ]);
         echo 'Crear resto de usuarios ---------';
         User::factory(50)->create();
    }
}

