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
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '2',
                'title' => '実務未経験者が初めての共同開発経験をまとめてみた',
                'category_id' => '1',
                'summary' => 'やんばるエキスパートの共同開発経験のまとめ記事',
                'url' => 'https://qiita.com/ryota100100/items/6b48f38b34d1cebaac0a',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '3',
                'title' => '新人3ヶ月エンジニアが学んだPHP関数',
                'category_id' => '2',
                'summary' => '未経験から転職したエンジニアが実務経験3ヶ月で学んだPHPの組み込み関数について',
                'url' => 'https://qiita.com/ziko7110/items/fec679e282209aed420e',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '1',
                'title' => '絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜前編〜',
                'category_id' => '1',
                'summary' => 'Docker、Laravel、Vueの実行環境の構築方法を超わかりやすく解説しました！ LGTMも290以上付いて反響が大きかったです。',
                'url' => 'https://qiita.com/shimotaroo/items/29f7878b01ee4b99b951',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '1',
                'title' => '絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜後編〜',
                'category_id' => '1',
                'summary' => '「絶対に失敗しないDockerでLaravel+Vueの実行環境（LEMP環境）を構築する方法〜前編〜」の後半です！',
                'url' => 'https://qiita.com/shimotaroo/items/679104b7e00dd9f89907',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '1',
                'title' => '【Laravel6】セッションの値が多重連想配列の時に特定のkeyに対応するvalueを更新する方法',
                'category_id' => '1',
                'summary' => 'セッションを扱うときに役立つ方法を説明しています。',
                'url' => 'https://qiita.com/shimotaroo/items/7e0bf4cb2847e2ea21f0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deleted_at' => NULL
            ],
        ]);

    }
}
