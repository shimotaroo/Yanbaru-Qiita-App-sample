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

// 記事CRUD処理用のルーティング
// 登録、編集、削除はログイン状態でしか使用できないようにする
Route::resource('articles', 'ArticleController')->only(['create', 'edit', 'store', 'update', 'destroy'])->middleware('auth');
Route::resource('articles', 'ArticleController')->only(['show']);

// 認証系のルーティング
Auth::routes();
