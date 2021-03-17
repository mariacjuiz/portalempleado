<?php

namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        echo 'Crear departamentos ---------';
        Department::factory()->create([
            'name' => 'Recursos Humanos',
            'user_id' => '1',
        ]);
        Department::factory()->create([
            'name' => 'Informática',
            'user_id' => '2',
        ]);
        Department::factory()->create([
            'name' => 'Dirección',
            'user_id' => '3',
        ]);
        Department::factory()->create([
            'name' => 'Administración',
            'user_id' => '4',
        ]);
        Department::factory()->create([
            'name' => 'Ventas',
            'user_id' => '5',
        ]);
        Department::factory()->create([
            'name' => 'Logística',
            'user_id' => '6',
        ]);
    }
}
