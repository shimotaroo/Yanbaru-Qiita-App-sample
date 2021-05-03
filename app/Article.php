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
        $articles = self::with(['user'])
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
        $query = DB::table('articles as a')
            ->select('a.id', 'a.user_id', 'users.name as user_name', 'users.term as user_term', 'a.title', 'a.url', 'a.created_at')
            ->join('users', 'a.user_id', '=', 'users.id')
            ->join('categories', 'a.category_id', '=', 'categories.id')
            ->where('a.deleted_at', self::NOT_DELETED);

        if(!empty($parametersForSearch['term'])) {
            $query->where('users.term', $parametersForSearch['term']);
        }
        if(!empty($parametersForSearch['category'])) {
            $query->where('categories.id', $parametersForSearch['category']);
        }
        if(!empty($parametersForSearch['word'])) {
            $query->where('a.title', 'like', '%' . $this->escapeLike($parametersForSearch['word']) . '%');
        }

        return $query->orderBy('a.created_at','desc')
            ->orderBy('a.id', 'asc')
            ->paginate(10);
    }

    /**
     * str_replaceでセキュリティ対策
     */
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
