<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->name(),	
            'url' => $this->faker->url(3),	
            'descripcion' => $this->faker->realText(),	
        ];
    }
}
