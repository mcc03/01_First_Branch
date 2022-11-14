<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::all();

        // limits number of articles shown per page to specified number
        $articles = Article::paginate(5);
        return view('user.articles.index')->with('articles', $articles);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Article $article)
    {
        if(!Auth::id()) {
            return abort(403);
          }

        //$article = Article::where('id', $id);
        return view('user.articles.show')->with('article', $article);
    }
}

    

        // dd($articles);

        // foreach($articles as $article) {
        //     echo $article->title. "<br>";
        // }

        // inserts data into DB
        // $article = new Article();
        // $article->title = "New title";
        // $article->author= "New author";
        // $article->save();