<?php

namespace Database\Factories;

use App\Models\Check;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Check::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $checkIN = ['8:00', '8:01', '8:02', '8:03', '8:04', '8:05', '8:06', '8:07', '8:08', '8:09','8:10', '8:11','8:12', '8:13','8:14','8:15'];
        $checkOUT = ['16:00', '16:01', '16:02', '16:03', '16:04', '16:05', '16:06', '16:07', '16:016', '16:09','16:10', '16:11','16:12', '16:13','16:14','16:15'];

        return [
            'user_id' => User::all()->random()->id,
            'day' => $this->faker->dateTimeBetween('01/01/2020', '01/04/2021'),
            'checkin' => $this->faker->randomElement($checkIN),
            'checkout'  =>  $this->faker->randomElement($checkOUT),
            "created_at" => now()
        ];
    }
}
