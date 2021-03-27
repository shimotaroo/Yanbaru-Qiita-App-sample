<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => '1',
                'title' => '【Laravel】artisanコマンドでやりたいこと、ここで見つかる',
                'category_id' => '1',
                'summary' => 'Laravelのartisanコマンドを探すためのまとめ記事',
                'url' => 'https://qiita.com/shimotaroo/items/6a909797e0139517b1bd',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '2',
                'title' => '実務未経験者が初めての共同開発経験をまとめてみた',
                'category_id' => '1',
                'summary' => 'やんばるエキスパートの共同開発経験のまとめ記事',
                'url' => 'https://qiita.com/ryota100100/items/6b48f38b34d1cebaac0a',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '3',
                'title' => '新人3ヶ月エンジニアが学んだPHP関数',
                'category_id' => '2',
                'summary' => '未経験から転職したエンジニアが実務経験3ヶ月で学んだPHPの組み込み関数について',
                'url' => 'https://qiita.com/ziko7110/items/fec679e282209aed420e',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '1',
                'title' => '絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜前編〜',
                'category_id' => '1',
                'summary' => 'Docker、Laravel、Vueの実行環境の構築方法を超わかりやすく解説しました！ LGTMも290以上付いて反響が大きかったです。',
                'url' => 'https://qiita.com/shimotaroo/items/29f7878b01ee4b99b951',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '1',
                'title' => '絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜後編〜',
                'category_id' => '1',
                'summary' => '「絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜前編〜」の後半です！',
                'url' => 'https://qiita.com/shimotaroo/items/679104b7e00dd9f89907',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '1',
                'title' => '【Laravel6】セッションの値が多重連想配列の時に特定のkeyに対応するvalueを更新する方法',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/shimotaroo/items/7e0bf4cb2847e2ea21f0',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '6',
                'title' => 'Laravel5.8 画像アップロード機能を仕組みから理解する',
                'category_id' => '1',
                'summary' => '画像アップロードの参考にしてください',
                'url' => 'https://qiita.com/kei_Q/items/62cb8747280266956100',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '3',
                'title' => '年末年始にリポジトリの大掃除　DS.storeを削除にしよう',
                'category_id' => '4',
                'summary' => 'なし',
                'url' => 'https://qiita.com/ziko7110/items/a0e4cfa8c49cb16b0b6c',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel】Re:ゼロから始めるAWSデプロイ -Docker環境-',
                'category_id' => '3',
                'summary' => '限定公開です',
                'url' => 'https://qiita.com/yoshitaro218/private/13b7df749f14c9164bf1',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜後編〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/e5f92b6c01c902fb91ef',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '4',
                'title' => '【Laravel カート機能実装入門】〜前半〜 sessionを使用したカート機能実装の完全解説!!',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/yoshitaro218/items/17ffde373038e4ed3664',
                'created_at' => now(),
                'updated_at' => now(),
                'deleted_at' => NULL
            ],
        ]);
    }
}
