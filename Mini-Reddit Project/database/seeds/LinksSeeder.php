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

            'content' => 'amro post1',
            'title' => 'post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'amro'

        ]);
        DB::table('links')->insert([

            'content' => 'amro post2',
            'title' => 'post2',
            'community_id' => 1,
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'amro'

        ]);
        DB::table('links')->insert([

            'content' => 'amro post3',
            'title' => 'post3',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'amro'

        ]);
        DB::table('links')->insert([

            'content' => 'ahmed post1',
            'title' => 'post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'ahmed'

        ]);
        DB::table('links')->insert([

            'content' => 'ahmed post2',
            'title' => 'post2',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'ahmed'

        ]);
        DB::table('links')->insert([

            'content' => 'ahmed post3',
            'title' => 'post3',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'ahmed'

        ]);
        DB::table('links')->insert([

            'content' => 'menna post1',
            'title' => 'post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'menna'

        ]);


        DB::table('links')->insert([

            'content' => 'nour post1',
            'title' => 'post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'nour'

        ]);
        DB::table('links')->insert([

            'content' => 'reham post1',
            'title' => 'post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'reham'

        ]);

        //comments

        DB::table('links')->insert([

            'content' => 'comment on post 1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'reham',
            'parent_id' => 1,
            'post_id' => 1

        ]);



        DB::table('links')->insert([

            'content' => 'comment on post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'ahmed',
            'parent_id' => 1,
            'post_id' => 1


        ]);


        DB::table('links')->insert([

            'content' => 'comment on post2',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'amro',
            'parent_id' => 2,
            'post_id' => 2


        ]);

        DB::table('links')->insert([

            'content' => 'comment on post4',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'menna',
            'parent_id' => 4,
            'post_id' => 4


        ]);

        DB::table('links')->insert([

            'content' => 'reply on comment1 on post4',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'menna',
            'parent_id' => 13,
            'post_id' => 4


        ]);

        DB::table('links')->insert([

            'content' => 'reply on comment2 on post1',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'menna',
            'parent_id' => 11 ,
            'post_id' => 1


        ]);


        DB::table('links')->insert([

            'content' => 'reply on comment2 on post1 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit',
            'parent_id' => 11 ,
            'post_id' => 1


        ]);


        DB::table('links')->insert([

            'content' => 'reply on comment1 on post4 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit',
            'parent_id' => 13,
            'post_id' => 4


        ]);

        DB::table('links')->insert([

            'content' => 'badr post1',
            'title' => 'post1 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit'

        ]);

        DB::table('links')->insert([

            'content' => 'badr post2',
            'title' => 'post2 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit'

        ]);


        DB::table('links')->insert([

            'content' => 'badr post3',
            'title' => 'post3 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit'

        ]);

        DB::table('links')->insert([

            'content' => 'badr post4',
            'title' => 'post4 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit'

        ]);

        DB::table('links')->insert([

            'content' => 'badr post5',
            'title' => 'post5 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit'

        ]);

        DB::table('links')->insert([

            'content' => 'badr post6',
            'title' => 'post6 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit'

        ]);

        DB::table('links')->insert([

            'content' => 'comment on post 1 by badr',
            'link_date' => date('Y-m-d H:i:s'),
            'author_username' => 'mini-reddit',
            'parent_id' => 1,
            'post_id' => 1

        ]);

    }
}
