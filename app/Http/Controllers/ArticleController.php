<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use App\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
        $articles = Article::with('user', 'comments')->orderBy('created_at', 'desc')->paginate(10);
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
     * CSVダウンロード
     * 
     * @return \Illuminate\Http\Response
     */
    public function downloadCsv()
    {

        $articles = Article::with('user', 'category')->orderBy('created_at', 'desc')->get()->toArray();
        $csvHeader = [
            '名前',
            'カテゴリー',
            'タイトル',
            '概要',
            'URL'
        ];
        $file = fopen('php://temp', 'r+b');
        if ($file) {
            fputcsv($file, $csvHeader);
            foreach ($articles as $article) {
                    $writeData = [
                        $article['user']['name'],
                        $article['category']['name'],
                        $article['title'],
                        $article['summary'],
                        $article['url'],
                    ];
                    fputcsv($file, $writeData);
            }
            rewind($file);
            $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($file));
            $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
            $headers = array(
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="yanbaru_qiita.csv"',
            );
        }
        dd(response($csv, 200, $headers));
        return response($csv, 200, $headers);
    }
}
