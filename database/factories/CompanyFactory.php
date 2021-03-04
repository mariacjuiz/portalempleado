<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Companytype;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ctype_id' => Companytype::all()->random()->id,
            'title'  => $this->faker->sentence(),
            'text' => $this->faker->paragraph(),
            'link' => 'www.google.es',
            'img' => 'https://d500.epimg.net/cincodias/imagenes/2021/01/30/fortunas/1611966582_769932_1611967774_miniatura_normal.jpg',
            'enabled' => true,
        ];
    }
}
