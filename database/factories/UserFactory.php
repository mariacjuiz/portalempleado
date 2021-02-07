<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image = ['img1.png', 'img2.png', 'img3.png', 'img4.png',
                  'img5.png', 'img6.png', 'img7.png', 'img8.png',
                  'img9.png', 'img10.png', 'img11.png', 'img12.png'];
        return [
            'cif' => Str::random(9),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'adress' =>  $this->faker->address,  //Str::random(100),
            'phone'  => $this->faker->phoneNumber,  //numberBetween(0, 9),
            'photo' => $this->faker->randomElement($image),
            'remember_token' => Str::random(10),
            'department' => $this->faker->numberBetween(1, 6)
        ];
    }
}

