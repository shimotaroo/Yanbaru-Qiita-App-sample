<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * 記事を投稿したユーザーを取得する
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
