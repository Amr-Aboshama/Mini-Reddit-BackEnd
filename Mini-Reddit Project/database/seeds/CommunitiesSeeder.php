<?php

use Illuminate\Database\Seeder;

class CommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communities')->insert([

            'name' => 'laravel',
            'description' => 'this community is for exhanging knowledge about laravel frame work' ,
            'rules' =>'no sarcasm, here you will be blocked'

        ]);
        DB::table('communities')->insert([

            'name' => 'm3l4',
            'description' => 'this community is for broken heart people' ,
            'rules' =>'sarcasm community, no seriousness here pls'

        ]);
        DB::table('communities')->insert([

            'name' => 'gogo',
            'description' => 'this community is very trivial don\'t subsribe us' ,
            'rules' =>'be trivial'

        ]);
        DB::table('communities')->insert([

            'name' => 'wawoooo',

        ]);

        DB::table('communities')->insert([

            'name' => 'reddit_community',
            'description' => 'discussing anything concerning reddit' ,
            'rules' =>'useful posts'

        ]);

        DB::table('communities')->insert([

            'name' => 'CSE',
            'description' => 'discussing anything concerning computer science' ,
            'rules' =>'no sarcasm'

        ]);

        DB::table('communities')->insert([

            'name' => 'Nasa',

        ]);

        DB::table('communities')->insert([

            'name' => 'google',

        ]);
    }
}
