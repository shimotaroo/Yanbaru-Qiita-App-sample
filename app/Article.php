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
     * Articleモデルを起点に記事にコメントしたUserモデルを取得する
     */
    public function comments()
    {
        return $this->belongsToMany('App\User', 'comments')->withPivot(['id','comment'])->withTimestamps();
    }
}
