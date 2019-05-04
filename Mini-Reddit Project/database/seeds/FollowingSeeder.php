<?php

use Illuminate\Database\Seeder;

class FollowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('followings')->insert([

            'follower_username' => 'amro',
            'followed_username' => 'ahmed'

        ]);
        DB::table('followings')->insert([

            'follower_username' => 'amro',
            'followed_username' => 'menna'

        ]);
        DB::table('followings')->insert([

            'follower_username' => 'amro',
            'followed_username' => 'reham'

        ]);
        DB::table('followings')->insert([

            'follower_username' => 'ahmed',
            'followed_username' => 'menna'

        ]);
        DB::table('followings')->insert([

            'follower_username' => 'menna',
            'followed_username' => 'ahmed'

        ]);

        DB::table('followings')->insert([

            'follower_username' => 'menna',
            'followed_username' => 'mini-reddit'

        ]);


        DB::table('followings')->insert([

            'follower_username' => 'ahmed',
            'followed_username' => 'mini-reddit'

        ]);


        DB::table('followings')->insert([

            'follower_username' => 'amro',
            'followed_username' => 'mini-reddit'

        ]);


        DB::table('followings')->insert([

            'follower_username' => 'mini-reddit',
            'followed_username' => 'ahmed'

        ]);

        DB::table('followings')->insert([

            'follower_username' => 'mini-reddit',
            'followed_username' => 'reham'

        ]);
    }
}
