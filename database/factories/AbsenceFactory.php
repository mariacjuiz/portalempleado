<?php

namespace Database\Factories;

use App\Models\Absence;
use App\Models\User;
use App\Models\Hour;
use Illuminate\Support\Date;
use Illuminate\Database\Eloquent\Factories\Factory;
use Symfony\Component\VarDumper\Cloner\Data;

class AbsenceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Absence::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        // $year = rand(2018, 2021);
        // $month = rand(1, 12);
        // $day = rand(1, 28);
        // $hour = rand(8, 18);
        // $min = rand(1, 59);
        // $sec = rand(1, 59);
        //$startdate = \Carbon\Carbon::parse($year,$month ,$day , 0, 0, 0);
        $startdate = $this->faker->dateTimeThisYear();
        return [
            'user_id' => User::all()->random()->id,
            'hour_id' => Hour::all()->random()->id,
            'startdate' => $startdate,
            'enddate'  => $this->faker->dateTimeBetween($startdate, '+3 days'),
            'validate' => "SI",
            "created_at" => now()
        ];
    }
}
