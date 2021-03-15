<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            // 1
            [
                'name' => 'ゆーたろー',
                'email' => 'sample@mail.com',
                'password' => Hash::make('password'),
                'term' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2
            [
                'name' => 'りょうた',
                'email' => 'sample1@mail.com',
                'password' => Hash::make('passwordpassword'),
                'term' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3
            [
                'name' => 'ジーコ',
                'email' => 'sample2@mail.com',
                'password' => Hash::make('passwordpasswordpassword'),
                'term' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 4
            [
                'name' => '加藤 tetsuyoshi',
                'email' => 'sample3@mail.com',
                'password' => Hash::make('password'),
                'term' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5
            [
                'name' => 'TARO',
                'email' => 'sample4@mail.com',
                'password' => Hash::make('password'),
                'term' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 6
            [
                'name' => 'けーすけ',
                'email' => 'sample5@mail.com',
                'password' => Hash::make('password'),
                'term' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
