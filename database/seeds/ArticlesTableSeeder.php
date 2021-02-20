<?php

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
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '2',
                'title' => '実務未経験者が初めての共同開発経験をまとめてみた',
                'category_id' => '1',
                'summary' => 'やんばるエキスパートの共同開発経験のまとめ記事',
                'url' => 'https://qiita.com/ryota100100/items/6b48f38b34d1cebaac0a',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NULL
            ],
            [
                'user_id' => '3',
                'title' => '新人3ヶ月エンジニアが学んだPHP関数',
                'category_id' => '2',
                'summary' => '未経験から転職したエンジニアが実務経験3ヶ月で学んだPHPの組み込み関数について',
                'url' => 'https://qiita.com/ziko7110/items/fec679e282209aed420e',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => NULL
            ],
        ]);

    }
}
