<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // amount of times it creates fake data
        Article::factory()->times(20)->create();

   foreach(User::all() as $user)
    {
        $articles = Article::inRandomOrder()->take(rand(5,10))->pluck('id');
        $user->articles()->attach($articles);

        foreach(Comment::all() as $comment)
        {
            $comment->comment = "test";
            $comment->save();
        }
     

    }
    }
}
