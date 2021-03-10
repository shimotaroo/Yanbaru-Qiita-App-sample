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
            [
                'name' => 'ゆーたろー',
                'email' => 'sample@mail.com',
                'password' => Hash::make('password'),
                'term' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'りょうた',
                'email' => 'sample1@mail.com',
                'password' => Hash::make('passwordpassword'),
                'term' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'ジーコ',
                'email' => 'sample2@mail.com',
                'password' => Hash::make('passwordpasswordpassword'),
                'term' => '3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
