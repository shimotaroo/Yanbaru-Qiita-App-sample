<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    // 論理削除するためのトレイト
    use SoftDeletes;

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

    /**
     * 絞り込み検索時にDBからデータを取得するqueryを作成
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function getBySearchParameters($inputTerm, $inputCategory, $inputWord)
    {
        $query = $this->query();
        $query->join('users', 'articles.user_id', 'users.id')
            ->join('categories', 'articles.category_id', 'categories.id');

        $query->when($inputTerm, function($query) use ($inputTerm) {
            return $query->where('users.term', $inputTerm);
        });
        $query->when($inputCategory, function($query) use ($inputCategory) {
            $query->where('categories.name', $inputCategory);
        });
        $query->when($inputWord, function($query) use ($inputWord) {
            $query->where('articles.title', 'like', '%' . $this->escapeLike($inputWord) . '%');
        });

        $searchedArticles = $query->orderBy('articles.created_at','desc');
        return $searchedArticles;
    }

    /**
     * str_replaceでセキュリティ対策
     */
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    /*
     * Articleモデルを起点に記事にコメントしたUserモデルを取得する
     */
    public function comments()
    {
        return $this->belongsToMany('App\User', 'comments')->withPivot(['id','comment'])->withTimestamps();
    }
}
