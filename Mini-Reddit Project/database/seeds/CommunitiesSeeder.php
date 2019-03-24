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

        ]);
        DB::table('communities')->insert([

            'name' => 'm3l4',

        ]);
        DB::table('communities')->insert([

            'name' => 'gogo',

        ]);
        DB::table('communities')->insert([

            'name' => 'wawoooo',

        ]);
    }
}
