<?php

namespace App\Http\Controllers;


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
        // page selection
        // $articles = Article::paginate(10);
        // returns info from articles table

        //shows all notes
        $articles = Article::all();

        // shows all notes from one user
        // $articles = Article::where('id', Auth::id())->paginate(5);
        // dd($articles);
        return view('articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
           'title' => 'required|max:50',
           'author' => 'required',
           'category' => 'required',
           'body_text' => 'required|max:500'
        ]);

        // saves data input from forum to db
        Article::create([
            // 'id' => Auth::id(),
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category,
            'body_text' => $request->body_text, 
            // 'updated_at' => now()
        ]);
        return to_route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //$article = Article::where('id', $id);
        return view('articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Article $article)
    {
        return view('articles.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|max:50',
            'author' => 'required',
            'category' => 'required',
            'body_text' => 'required|max:500'
        ]);

        $article->update([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category,
            'body_text' => $request->body_text, 
        ]);

        return to_route('articles.show', $article)->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return to_route('articles.index');
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