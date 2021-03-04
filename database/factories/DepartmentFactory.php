<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DepartmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Department::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $depart = ['Informática', 'Marketing', 'Administración', 'Dirección', 'Ventas', 'Compras', 'Mantenimiento', 'Comercial', 'Logística', 'Jurídico'];
        return [
        //     'name'  => $this->faker->randomElement($depart),
        //     'user_id' => User::all()->random()->id,
        ];
    }
}
