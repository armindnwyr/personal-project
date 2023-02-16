<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo'=>$this->faker->name(),
            'paginas'=>$this->faker->randomNumber(),
            'editorial'=>$this->faker->name(),
            'isbn'=>$this->faker->randomNumber(),
            'anio'=>$this->faker->date(),
            'idioma'=>$this->faker->name(),
            'resumen'=>$this->faker->text(),
        ];
    }
}
