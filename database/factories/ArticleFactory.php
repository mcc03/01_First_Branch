<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // I use faker to input sample data into the database
            // randomElement picks a random suffix in the array to add onto the 'Bouldering' prefix
            'title' => 'Bouldering '.$this ->faker->randomElement(['Finals', 'Cup', 'Gym', 'Competition', 'Training', 'Accident', 'For Noobs', 'Tips!', "... Is It Safe?"]),
            // selects random image in the array
            'article_image' => $this ->faker->randomElement (['womans_cup.jpg', 'bouldering_3.jpg', 'bouldering_4.jpg', 'bouldering_5.jpg', 'Bouldering_Equipment.jpg']),
            'author' => $this->faker->name,
            // 'category_id' => $this->faker->randomDigit(1, 10),
            // can't figure out how to insert paragraphs into the seeder using faker
            'body_text' => $this->faker->paragraph($nbSentences = 20, $variableNbSentences = true)
        ];
    }
}
