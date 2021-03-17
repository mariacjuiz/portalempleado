<?php

namespace Database\Factories;

use App\Models\Salary;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id,
            'year' => $this->faker->numberBetween(2018,2020),
            'month' => $this->faker->numberBetween(1, 12),
            'total' => $this->faker->randomFloat(2, 800, 2500),
            'url' => 'uploads/nonima.png'
        ];
    }
}

