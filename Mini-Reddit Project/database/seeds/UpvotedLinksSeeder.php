<?php

use Illuminate\Database\Seeder;

class UpvotedLinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('upvoted_links')->insert([
            'username' => 'ahmed',
            'link_id' => 1
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'ahmed',
            'link_id' => 2
        ]);


        DB::table('upvoted_links')->insert([
            'username' => 'ahmed',
            'link_id' => 15
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'ahmed',
            'link_id' => 19
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'menna',
            'link_id' => 19
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => 2
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => 10
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => 12
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => 5
        ]);

        DB::table('upvoted_links')->insert([
            'username' => 'mini-reddit',
            'link_id' => 15
        ]);
    }
}
