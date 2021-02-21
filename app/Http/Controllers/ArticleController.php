<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * コンストラクタ定義
     * ポリシーを使用できるようにする
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
    }

    /**
     * 記事一覧画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('user')->get();
        return view('articles.index', compact('articles'));
    }

    /**
     * 記事投稿画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $categoryForRadioButton = $category->getAll();
        return view('articles.create', compact('categoryForRadioButton'));
    }

    /**
     * 記事投稿（新規登録）処理
     *
     * @param  App\Http\Requests\ArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->fill($request->all());
        $article->user_id = Auth::id();
        $article->save();

        return redirect()->route('index')->with('flashMsg',  '記事を投稿しました');
    }

    /**
     * 記事詳細画面表示
     *
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * 記事編集画面表示
     * パラメータにArticleモデルのインスタンスを渡すことで自動的にidをパラメータにセットしてくれる
     *
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $category = new Category();
        $categoryForRadioButton = $category->getAll();

        return view('articles.edit', compact(['article', 'categoryForRadioButton']));
    }

    /**
     * 記事編集処理
     * パラメータにArticleモデルのインスタンスを渡すことで自動的にidをパラメータにセットしてくれる
     *
     * @param  App\Http\Requests\ArticleRequest  $request
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();

        return redirect()->route('index')->with('flashMsg',  '記事を編集しました');
    }

    /**
     * 記事削除処理
     *
     * @param  App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('index')->with('flashMsg',  '記事を削除しました');;
    }
}
