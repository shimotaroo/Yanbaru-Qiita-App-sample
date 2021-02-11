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

// CRUD処理用のルーティング
Route::resource('articles', 'ArticleController', ['only' => ['create', 'edit', 'store', 'show', 'update', 'destroy']]);

// 認証系のルーティング
Auth::routes();
