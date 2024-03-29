<?php

namespace Database\Factories;

use App\Models\Vacation;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'user_id' => User::all()->random()->id,
            'startdate' => '2021/01/02',
            'enddate'  => '2021/01/03',
            'validate' => "SI",
            "created_at" => now()
        ];
    }

}

