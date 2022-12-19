<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->sentence(),
            'post_id'=>1,
            'content'=>$this->faker->url(),
            'user_id'=>1
        ];
    }
}
