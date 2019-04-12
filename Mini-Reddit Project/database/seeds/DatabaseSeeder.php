<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( [UsersSeeder::class
            ,CommunitiesSeeder::class
            ,FollowingSeeder::class
            ,LinksSeeder::class
            ,SubsribeSeeder::class
            ,BlockingSeeder::class
            ,SavedLinksSeeder::class
            ,UpvotedLinks::class
            ,DownvotedLinks::class
        ]);
    }
}
