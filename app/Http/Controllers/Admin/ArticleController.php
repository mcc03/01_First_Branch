<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
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
        // $articles = Article::all();


        $user = Auth::user();
        $user->authorizeRoles('admin');
        // limits number of articles shown per page to specified number
        // $articles = Article::with('category')->paginate(5);

        //gets articles associated with a user, category and comment
        $articles = Article::with('users')
            ->with('category')
            ->with('comments')
            // ->paginate(5)
            ->get();

        // shows all notes from one user
        // $articles = Article::where('id', Auth::id())->paginate(5);
        // dd($articles);
        return view('admin.articles.index')->with('articles', $articles);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');


        $categories = Category::all();
        $users = User::all();
        $comments = Comment::all();

        // return back to index with articles that have comments, categories and users associated with them
        return view('admin.articles.create')->with('categories', $categories)->with('users', $users)
            ->with('comments', $comments);

        // $articles = Article::with('categories')
        // ->with('users')
        // ->with('comments');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');
        // before storing, the values below are checked
        $request->validate([
            'title' => 'required|max:50',
            'author' => 'required',
            'category_id' => 'required',
            'body_text' => 'required|max:500',
            'article_image' => 'file|image',
            // 'user' => 'required',
            // 'comment' => 'required',
            // 'users' => ['required', 'exists:users,id'],
            // 'comments' => ['required', 'exists:comments,id']

        ]);

        $article_image = $request->file('article_image');
        // getClientOriginalExtension() method returns the original file extension
        $extension = $article_image->getClientOriginalExtension();
        //this makes the image filename unique
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;

        $path = $article_image->storeAs('public/images', $filename);
        // saves data input from forum to db
        $article = Article::create([
            // 'id' => Auth::id(),
            'article_image' => $filename,
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'body_text' => $request->body_text,
            // 'updated_at' => now()
        ]);

        // adds data into the linking table
        // $article->users()->attach($request->users);
        // $article->comments()->attach($request->comments);

        // when you create the article, it redirects you back to the index. There you will see the newly made article
        return to_route('admin.articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        //$article = Article::where('id', $id);
        return view('admin.articles.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit(Article $article)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $categories = Category::all();
        $users = User::all();
        $comments = Comment::all();

        // return back to index with articles that have comments, categories and users associated with them
        return view('admin.articles.edit')->with('article', $article)
        ->with('categories', $categories)->with('users', $users)
        ->with('comments', $comments);
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

        $user = Auth::user();
        $user->authorizeRoles('admin');

        // before storing, the values below are checked
        $request->validate([
            'title' => 'required|max:50',
            'author' => 'required',
            'category_id' => 'required',
            'body_text' => 'required|max:500',
            'article_image' => 'file|image'
        ]);

        $article_image = $request->file('article_image');
        $extension = $article_image->getClientOriginalExtension();
        //unique filename
        $filename = date('Y-m-d-His') . '_' . $request->input('title') . '.' . $extension;
        // stores the file in /pubic/images, and names it $filename
        $path = $article_image->storeAs('public/images', $filename);

        // specified fields that are to update when submitting forum
        $article->update([
            'article_image' => $filename,
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'body_text' => $request->body_text,
        ]);

        // passes in the article_id and user_id, attaches user_id to article_id and saves comment
        if ($request->comment) {
            $article_id = $article->id;
            $user->articles()->attach($article_id);
            foreach (Comment::all() as $comment) {
                $comment->comment = $request->comment;
                $comment->save();
            }
            // $article->comments()->attach($request->comment, $user->id, $article->id);
        }

        // after updating the article it returns to the original view of the article
        return to_route('admin.articles.show', $article)->with('success', 'Article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $article->delete();

        // confirmation message will popup when returning to index after successfully deleting article
        return to_route('admin.articles.index')->with('success', 'Note deleted successfully');
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