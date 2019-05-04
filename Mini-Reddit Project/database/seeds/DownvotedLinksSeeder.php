<?php

use Illuminate\Database\Seeder;

class DownvotedLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('downvoted_links')->insert([
            'username' => 'amro',
            'link_id' => 1
        ]);

        DB::table('downvoted_links')->insert([
            'username' => 'reham',
            'link_id' => 2
        ]);


        DB::table('downvoted_links')->insert([
            'username' => 'nour',
            'link_id' => 15
        ]);

        DB::table('downvoted_links')->insert([
            'username' => 'nour',
            'link_id' => 20
        ]);

        DB::table('downvoted_links')->insert([
            'username' => 'menna',
            'link_id' => 20
        ]);

        DB::table('downvoted_links')->insert([
            'username' => 'ahmed',
            'link_id' => 19
        ]);
    }
}
