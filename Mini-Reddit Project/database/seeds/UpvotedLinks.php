<?php

use Illuminate\Database\Seeder;

class UpvotedLinks extends Seeder
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


    }

}
