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

            'community_id'=>1,
            'user_name'=>'ahmed'

        ]);
        DB::table('subscribtions')->insert([

            'community_id'=>2,
            'user_name'=>'amr'

        ]);
        DB::table('subscribtions')->insert([

            'community_id'=>3,
            'user_name'=>'ahmed'

        ]);
    }
}
