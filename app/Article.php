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
     * 記事検索用のベースとなるクエリ生成
     */
    public function getQuery()
    {
        $queryForSearchArticles = $this->query()
            ->join('users', 'articles.user_id', 'users.id')
            ->join('categories', 'articles.category_id', 'categories.id');

            return $queryForSearchArticles;
    }
}
