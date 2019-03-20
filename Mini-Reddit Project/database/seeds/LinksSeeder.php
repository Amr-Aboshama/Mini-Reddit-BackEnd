<?php

use Illuminate\Database\Seeder;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('links')->insert([                     //post
            'title' => 'For downvote testing',
            'content' => 'Post: Hello World!',
            'author_user_name' => 'amr',
          ]);

          DB::table('links')->insert([                    //comment
            'title' => 'For downvote testing',
            'content' => 'Post: Hello World!',
            'author_user_name' => 'amr',
            'parent_id' => 1
          ]);

          /*for ($counter=0; $counter < 10; $counter++)
          {
              DB::table('links')->insert([
                'title' => Str::random(10),
                'content' => Str::random(10),
                'author_user_name' => Str::random(10),
              ]);
          }*/
    }
}