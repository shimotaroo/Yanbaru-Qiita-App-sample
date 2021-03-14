<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $category = new Category();
        $categoryForSelects = $category->getAll();
        $articles = Article::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('articles.index', compact('articles', 'categoryForSelects'));
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

    /**
     *  検索結果画面表示
     */
    public function searchArticles(Request $request)
    {
        $selectTerm = $request->input('term');
        $selectCategory = $request->input('category');
        $selectWord = $request->input('word');

        // クエリ生成
        $article = new Article();
        $query = $article->getQuery();

        // Term のみが選択されていた場合
        if (!empty($selectTerm) && empty($selectCategory) && empty($selectWord) ) {
            $query->where('users.term', $selectTerm);
        }
        // Category のみが選択されていた場合
        if (empty($selectTerm) && !empty($selectCategory) && empty($selectWord) ) {
            $query->where('categories.name', $selectCategory);
        }
        // Word のみが選択されていた場合
        if (empty($selectTerm) && empty($selectCategory) && !empty($selectWord) ) {
            $query->where('articles.title', 'like', '%' . $selectWord . '%');
        }
        // Term・Category が選択されていた場合
        if (!empty($selectTerm) && !empty($selectCategory) && empty($selectWord) ) {
            $query->where('users.term', $selectTerm)
                ->where('categories.name', $selectCategory);
            }
        // Term・Word が選択されていた場合
        if (!empty($selectTerm) && empty($selectCategory) && !empty($selectWord) ) {
            $query->where('users.term', $selectTerm)
                ->where('articles.title', 'like', '%' . $selectWord . '%');
        }
        // Category・Word が選択されていた場合
        if (empty($selectTerm) && !empty($selectCategory) && !empty($selectWord) ) {
            $query->where('categories.name', $selectCategory)
                ->where('articles.title', 'like', '%' . $selectWord . '%');
        }
        // Term・Category・Word が選択されていた場合
        if (!empty($selectTerm) && !empty($selectCategory) && !empty($selectWord) ) {
            $query->where('users.term', $selectTerm)
                ->where('categories.name', $selectCategory)
                ->where('articles.title', 'like', '%' . $selectWord . '%');
        }

        // ページネーション 作成日降順
        $articles = $query->orderBy('articles.created_at','desc')->paginate(10);
        $category = new Category();
        $categoryForSelects = $category->getAll();
        return view('articles.index', compact('articles', 'categoryForSelects', 'selectTerm', 'selectCategory', 'selectWord'));
    }
}