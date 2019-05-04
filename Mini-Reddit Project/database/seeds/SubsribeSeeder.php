<?php

use Illuminate\Database\Seeder;

class SubsribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribtions')->insert([

            'community_id' => 1,
            'username' => 'ahmed'

        ]);
        DB::table('subscribtions')->insert([

            'community_id' => 2,
            'username' => 'amro'

        ]);
        DB::table('subscribtions')->insert([

            'community_id' => 3,
            'username' => 'ahmed'

        ]);

        DB::table('subscribtions')->insert([

            'community_id' => 4,
            'username' => 'mini-reddit'

        ]);

        DB::table('subscribtions')->insert([

            'community_id' => 5,
            'username' => 'mini-reddit'

        ]);
    }
}
