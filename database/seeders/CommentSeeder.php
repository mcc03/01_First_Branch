<?php

namespace Database\Seeders;


use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::factory()
        ->times(3)
        // ->hasArticles(4)
        ->create();

        // // for each comment attach a random user_id (1 or 2) and attach an article_id
    //     // foreach(Comment::all() as $comment)
    //     // {
    //         $article = Article::inRandomOrder()->pluck('id');
    //         $user = User::inRandomOrder()->pluck('id');

            
    // //    }

    }
}
