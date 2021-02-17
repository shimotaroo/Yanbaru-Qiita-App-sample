<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
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
}
