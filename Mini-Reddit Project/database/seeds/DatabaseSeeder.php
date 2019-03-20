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
        $this->call(UsersSeeder::class);
        $this->call(CommunitiesSeeder::class);
        $this->call(FollowingSeeder::class);
        $this->call(LinksSeeder::class);
        $this->call(SubsribeSeeder::class);
    }
}
