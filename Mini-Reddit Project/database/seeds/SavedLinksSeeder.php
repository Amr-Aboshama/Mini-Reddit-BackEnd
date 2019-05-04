<?php

use Illuminate\Database\Seeder;

class SavedLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('saved_links')->insert([
            'username' => 'ahmed',
            'link_id' => '15'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'ahmed',
            'link_id' => '13'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'menna',
            'link_id' => '1'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'amro',
            'link_id' => '12'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'amro',
            'link_id' => '14'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => '14'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => '10'
        ]);

        DB::table('saved_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => '12'
        ]);
    }
}
