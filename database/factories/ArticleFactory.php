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
            // this puts in fake data into the database
            // randomElement picks a random suffix in the array to add onto the 'Bouldering' prefix
            'title' => 'Bouldering '.$this ->faker->randomElement(['Finals', 'Cup', 'Gym', 'Competition', 'Training', 'Accident', 'For Noobs', 'Tips!', "... Is It Safe?"]),
            // selects random image in the array
            'article_image' => $this ->faker->randomElement (['2022-10-28-084020_New Gym!.jpg', 'Bouldering_IFCS.jpg', 'womans_cup.jpg', 'bouldering_1.PNG', 'bouldering_2.jpeg', 'bouldering_3.jpg', 'bouldering_4.jpg', 'bouldering_5.jpg']),
            'author' => $this->faker->name,
            'category_id' => $this->faker->randomDigit(1, 10),
            'body_text' => $this->faker->text(500, 600)
        ];
    }
}
