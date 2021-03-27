<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PHP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Docker',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'web基礎',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
