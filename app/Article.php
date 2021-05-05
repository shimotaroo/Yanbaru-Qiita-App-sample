<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    // 論理削除するためのトレイト
    use SoftDeletes;

    const NOT_DELETED = NULL;

    protected $fillable = [
        'title',
        'category_id',
        'summary',
        'url',
    ];

    /**
     * 記事を投稿したユーザーを取得する
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 記事のカテゴリー情報を取得する
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /*
     * Articleモデルを起点に記事にコメントしたUserモデルを取得する
     */
    public function comments()
    {
        return $this->belongsToMany('App\User', 'comments')->withPivot(['id','comment'])->withTimestamps();
    }

    /**
     * 全件取得
     * 
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAll()
    {
        $articles = self::with('user')
            ->orderBy('created_at','desc')
            ->orderBy('id', 'asc')
            ->paginate(10);

        return $articles;
    }

    /**
     * 検索フォームに入力されたパラメータを元に検索をかける
     * 
     * @param array $parametersForSearch
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function searchByInputParameters($parametersForSearch)
    {
        $searchedArticles = self::with('user')
            ->when($parametersForSearch['term'], function($q) use($parametersForSearch){
                return $q->whereHas('user', function($q) use($parametersForSearch) {
                    $q->where('term', $parametersForSearch['term']);
                });
            })
            ->when($parametersForSearch['category'], function($q) use($parametersForSearch) {
                return $q->where('category_id', $parametersForSearch['category']);
            })
            ->when($parametersForSearch['word'], function($q) use($parametersForSearch) {
                return $q->where('title', 'like', '%' . $parametersForSearch['word'] . '%');
            })
            ->orderBy('created_at','desc')
            ->orderBy('id', 'asc')
            ->paginate(10);
        
        return $searchedArticles;
    }
}
