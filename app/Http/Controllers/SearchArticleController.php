<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchArticleController extends Controller
{
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
     *  検索結果画面表示
     *  チェック項目
     *  ・GETパラメータの種類がterm、category、wordのどれかになっているか
     *  ・termは20以下になっているか
     *  ・categoryはDBマスタ（categories）の最大id以下になっているか
     *  ・ワード検索は30字以内になっているか（数百万くらいの入力値を弾くため）
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categoryForSelectBox= $this->category->getAll();

        // 検索用パラメータ
        $parametersForSearch = $request->all();

        // GETパラメータのkeyに不正なものがないかチェック
        // （例）?test=の場合は404を返す
        foreach ($parametersForSearch as $key => $value) {
            if (!in_array($key, ['term', 'category', 'word'])) {
                // MEMO:404を返すようにしているけど400の方が良い
                abort(404);
            }
        }

        // GETパラメータのvalueに不正な値がないかチェックするためにint型にキャストする（string型だとチェックできない）
        if (!is_null($parametersForSearch['term'])) {
            $parametersForSearch['term'] = (int) $request->term;
        }
        if (!is_null($parametersForSearch['category'])) {
            $parametersForSearch['category'] = (int) $request->category;
        }

        $maxCategoryId = $this->category->max('id');

        $validator = Validator::make($parametersForSearch, [
            'term' => ['numeric', 'max:20', 'nullable'],
            'category' => ['numeric', 'max:' . $maxCategoryId, 'nullable'],
            'word' => ['string', 'nullable', 'max:30'],
        ]);

        if ($validator->fails()) {
            // MEMO:404を返すようにしているけど400の方が良い
            abort(404);
        }

        $articles = $this->article->searchByInputParameters($parametersForSearch);

        return view('articles.index', compact('articles', 'parametersForSearch', 'categoryForSelectBox'));
    }
}
