<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        //     'comment' =>$this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),

        //     'user_id' =>$this->faker->randomDigit(1, 2),
        // //    'article_id'=>$this->faker->randomDigti(1, 12) 
        ];
    }
}
