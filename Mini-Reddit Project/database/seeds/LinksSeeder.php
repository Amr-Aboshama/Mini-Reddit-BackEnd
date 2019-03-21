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
        DB::table('links')->insert([

          'content'=>'amr post1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'amr'

        ]);
        DB::table('links')->insert([

          'content'=>'amr post2',
          'title' => 'post2',
          'community_id' => 1,
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'amr'

        ]);
        DB::table('links')->insert([

          'content'=>'amr post3',
          'title' => 'post3',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'amr'

        ]);
        DB::table('links')->insert([

          'content'=>'ahmed post1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'ahmed'

        ]);
        DB::table('links')->insert([

          'content'=>'ahmed post2',
          'title' => 'post2',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'ahmed'

        ]);
        DB::table('links')->insert([

          'content'=>'ahmed post3',
          'title' => 'post3',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'ahmed'

        ]);
        DB::table('links')->insert([

          'content'=>'menna post1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'menna'

        ]);
        DB::table('links')->insert([

          'content'=>'nour post1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'nour'

        ]);
        DB::table('links')->insert([

          'content'=>'reham post1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'reham'

        ]);

        //comments

        DB::table('links')->insert([

          'content'=>'comment on post 1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'reham',
          'parent_id' => 1

        ]);

        DB::table('links')->insert([

          'content'=>'comment on post1',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'ahmed',
          'parent_id' => 1


        ]);


        DB::table('links')->insert([

          'content'=>'comment on post2',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'amr',
          'parent_id' => 2


        ]);

        DB::table('links')->insert([

          'content'=>'comment on post4',
          'title' => 'post1',
          'link_date' => date('Y-m-d H:i:s'),
          'author_user_name' => 'menna',
          'parent_id' => 4


        ]);
    }
}
