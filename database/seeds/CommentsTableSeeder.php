<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            [
                'user_id' => '1',
                'article_id' => '10',
                'comment' => 'とてもわかりやすいですね！！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '3',
                'article_id' => '1',
                'comment' => '参考になります！！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '4',
                'article_id' => '8',
                'comment' => 'とてもわかりやすいですね！！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => '5',
                'article_id' => '1',
                'comment' => '読みやすいですね！！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
