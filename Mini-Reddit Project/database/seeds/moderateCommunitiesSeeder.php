<?php

use Illuminate\Database\Seeder;

class moderateCommunitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moderate_communities')->insert([
            "username"=>"amro",
            "community_id"=> 2
        ]);

        DB::table('moderate_communities')->insert([
            "username"=>"mini-reddit",
            "community_id"=> 4
        ]);

        DB::table('moderate_communities')->insert([
            "username"=>"ahmed",
            "community_id"=> 1
        ]);
    }
}
