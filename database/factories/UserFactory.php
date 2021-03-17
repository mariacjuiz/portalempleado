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
        $image = ['uploads/chica1.jpg', 'uploads/chica2.jpg', 'uploads/chica3.jpg', 'uploads/chica4.jpg', 'uploads/chica5.jpg',
                  'uploads/persona1.jpg', 'uploads/persona2.jpg', 'uploads/persona3.jpg', 'uploads/persona4.jpg', 'uploads/persona5.jpg',
                  'uploads/persona6.jpg', 'uploads/persona7.jpg'];
        return [
            'cif' => Str::random(9),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$qNoMoGWj37xKfmcGo1Q.0elmHKxFidM.ogDuuV86w899lYfzA5TkO', // password
            'adress' =>  $this->faker->address,  //Str::random(100),
            'phone'  => $this->faker->phoneNumber,  //numberBetween(0, 9),
            'photo' => $this->faker->randomElement($image),
            'remember_token' => Str::random(10),
            'department' => $this->faker->numberBetween(1, 6),
            'is_admin' =>  false,
            'created_at' => now()
        ];
    }
}

