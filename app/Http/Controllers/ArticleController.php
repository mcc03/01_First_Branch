<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index() {
        // return view('welcome');

        // $articles = Article::all();
        // dd($articles);

        // foreach($articles as $article) {
        //     echo $article->title. "<br>";
        // }

        // inserts data into DB
        $article = new Article();
        $article->title = "New title";
        $article->author= "New author";
        $article->save();
    }  
}
