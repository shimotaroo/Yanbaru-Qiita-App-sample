<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * 投稿画面表示
     * 
     * @param App\Article $article
     */
    public function create(Article $article)
    {
        return view('articles.comment', compact('article'));
    }

    /**
     * 投稿処理
     */
    public function store(Article $article)
    {
        return view('articles.comment');
    }
}
