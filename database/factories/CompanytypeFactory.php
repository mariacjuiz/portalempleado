<?php

namespace Database\Factories;

use App\Models\Companytype;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanytypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Companytype::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$tipo = ['Noticia', 'Promoción interna', 'Curso', 'Evento'];
        return [
        //    'name'  => $this->faker->randomElement($tipo)
        ];
    }
}
