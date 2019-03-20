<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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

          'follower_user_name'=>'amr',
          'followed_user_name' =>'ahmed'

        ]);
        DB::table('followings')->insert([

          'follower_user_name'=>'amr',
          'followed_user_name' =>'menna'

        ]);
        DB::table('followings')->insert([

          'follower_user_name'=>'amr',
          'followed_user_name' =>'reham'

        ]);
        DB::table('followings')->insert([

          'follower_user_name'=>'ahmed',
          'followed_user_name' =>'menna'

        ]);
        DB::table('followings')->insert([

          'follower_user_name'=>'menna',
          'followed_user_name' =>'ahmed'

        ]);
    }
}
