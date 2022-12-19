<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            "name"=>$this->faker->word,
           "features"=>$this->faker->words,
            "price"=>$this->faker->biasedNumberBetween,
            "is_true"=>$this->faker->boolean

        ];
    }
}
