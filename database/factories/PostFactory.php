<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'title' => $this->faker->sentence(),
            'image'=>$this->faker->image(),
            'excerpt'=>$this->faker->sentence(),
            'content'=>$this->faker->url(),
            'user_id'=>1
        ];
    }
}
