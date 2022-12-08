<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        // if a comment is made the article id, user id and comment is passed into the article object and saved
        if ($request->comment) {
            $comment = new Comment();
            $article_id = $article->id;
            $comment->user_id = $user->id;
            $comment->article_id = $article_id;
            $comment->comment = $request->comment;
            $comment->save();
        }

        // after updating the article it returns to the original view of the article
        return to_route('admin.articles.show', $article)->with('success', 'Article updated successfully');
    }
}
