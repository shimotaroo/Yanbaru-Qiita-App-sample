<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * 投稿画面表示
     * 
     * @param App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        return view('comments.create', compact('article'));
    }

    /**
     * 投稿処理
     * 
     * @param  App\Http\Requests\ArticleRequest  $request
     * @param App\Article $article
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Article $article)
    {
        $comment = new Comment();

        DB::transaction(function () use ($comment, $article, $request){
            $comment->fill($request->all());
            $comment->user_id = Auth::id();
            $comment->article_id = $article->id;
            $comment->save();

            return $comment;
        });

        return redirect()->route('articles.show', $article)->with('flashMsg',  'コメントを投稿しました');
    }

    /**
     * コメント削除処理
     *
     * @param  App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        DB::transaction(function () use ($comment){
            $comment->delete();
            return $comment;
        });
        return redirect()->route('articles.show', $comment->article_id)->with('flashMsg',  'コメントを削除しました');;
    }
}
