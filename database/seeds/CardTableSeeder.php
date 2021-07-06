<?php

use Illuminate\Database\Seeder;

class CardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
            'title' => 'Card 1',
        ]);

        DB::table('cards')->insert([
            'title' => 'Card 2',
        ]);

        DB::table('cards')->insert([
            'title' => 'Card 3',
        ]);
    }
}
