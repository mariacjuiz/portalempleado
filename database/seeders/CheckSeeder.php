<?php

namespace Database\Seeders;
use App\Models\Check;
use Illuminate\Database\Seeder;

class CheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'Crear fichajes aleatorios ---------';
        Check::factory(250)->create();
    }
}
