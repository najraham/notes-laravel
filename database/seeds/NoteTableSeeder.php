<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notes')->insert([
            'card_id' => 1,
            'user_id' => 1,
            'body' => 'Note 1'
        ]);

        DB::table('notes')->insert([
            'card_id' => 1,
            'user_id' => 1,
            'body' => 'Note 2'
        ]);

        DB::table('notes')->insert([
            'card_id' => 1,
            'user_id' => 1,
            'body' => 'Note 3'
        ]);
    }
}
