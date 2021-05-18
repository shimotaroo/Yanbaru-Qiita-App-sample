<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /** @var Article */
    private $article;

    /** @var Category */
    private $category;

    /**
     * コンストラクタ定義
     * ポリシーを使用できるようにする
     * Articleクラスを$this->articleで呼び出せるようにする（各メソッドでの定義を不要にする）
     * 
     * @param  App\Article  $article
     */
    public function __construct()
    {
        $this->authorizeResource(Article::class, 'article');
        $this->article = new Article();
        $this->category = new Category();
    }

    /**
     * 記事一覧画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoryForSelectBox = $this->category->getAll();
        $articles = $this->article->getAll();
        return view('articles.index', compact('articles', 'categoryForSelectBox'));
    }

    /**
     * 記事投稿画面表示
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryForRadioButton = $this->category->getAll();
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

        // トランザクション
        DB::transaction(function () use ($article, $request){
            $article->fill($request->all());
            $article->user_id = Auth::id();
            $article->save();

            return $article;
        });

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
        // 記事のコメント取得
        $comments = $article->comments;
        
        return view('articles.show', compact('article', 'comments'));
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
        $categoryForRadioButton = $this->category->getAll();

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
        DB::transaction(function () use ($article, $request){
            $article->fill($request->all())->save();
            
            return $article;
        });

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
        DB::transaction(function () use ($article){
            $article->delete();
            return $article;
        });
        return redirect()->route('index')->with('flashMsg',  '記事を削除しました');;
    }
}
