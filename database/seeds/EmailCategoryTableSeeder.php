<?php

use Illuminate\Database\Seeder;

class EmailCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emailCategory')->insert([
            'category' => 'inbox',
        ]);
        DB::table('emailCategory')->insert([
            'category' => 'sent',
        ]);
        DB::table('emailCategory')->insert([
            'category' => 'draft'
        ]);
        DB::table('emailCategory')->insert([
            'category' => 'trash',
        ]);
    }
}
