<?php

use Illuminate\Database\Seeder;

class tweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tweets')->insert([
            'content' => Str::random(100),
            'author' => Str::random(15)
        ]);
    }
}
