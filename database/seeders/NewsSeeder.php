<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dateTime = date('Y-m-d H:i:s');

        DB::table('news')->insert([
            'title' => 'test',
            'text' => 'lorem ipsum',
            'shop_id' => 1,
            'user_id' => 1,
            'created_at' => $dateTime,
            'updated_at' => $dateTime,
        ]);
    }
}
