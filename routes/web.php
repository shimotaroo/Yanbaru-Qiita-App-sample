<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// トップページ
Route::get('/', 'ArticleController@index')->name('index');

/**
 * 記事
 */
// CRUD用
// 登録、編集、削除はログイン状態でしか使用できないようにする
Route::resource('articles', 'ArticleController')->only(['create', 'edit', 'store', 'update', 'destroy'])->middleware('auth');
Route::resource('articles', 'ArticleController')->only(['show']);

/**
 * コメント
 */
Route::prefix('comments')->name('comments.')->middleware('auth')->group(function(){
    Route::get('/{article}/create', 'CommentController@create')->name('create');
    Route::post('/{article}/store', 'CommentController@store')->name('store');
    Route::delete('/{comment}/delete', 'CommentController@destroy')->name('destroy');
});

/**
 * 認証
 */
Auth::routes();

/**
 * ユーザー
 */
//CRUD用
Route::resource('user', 'UserController')->only(['edit', 'update', 'show'])->middleware('auth');

/**
 * 検索
 */
Route::get('searchArticles','ArticleController@searchArticles')->name('searchArticles');
