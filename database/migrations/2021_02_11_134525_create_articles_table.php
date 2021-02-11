<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->comment('ユーザーID');
            $table->string('title')->comment('記事タイトル');
            $table->unsignedBigInteger('category_id')->comment('カテゴリーID');
            $table->string('summary')->comment('記事概要');
            $table->string('url')->comment('記事URL');
            $table->timestamps();
            $table->boolean('delete_flag')->comment('削除フラグ（0:存在、1:削除済');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
