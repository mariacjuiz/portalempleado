<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Absence;
class AbsencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'Crear ausencias aleatorias ---------';
        Absence::factory(50)->create();
    }
}
