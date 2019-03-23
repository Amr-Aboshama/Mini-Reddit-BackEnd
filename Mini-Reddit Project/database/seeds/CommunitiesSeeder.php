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

            'name'=>'laravel',
            // 'creation_date' => date('Y-m-d H:i:s')

        ]);
        DB::table('communities')->insert([

            'name'=>'m3l4',
            // 'creation_date' => date('Y-m-d H:i:s')

        ]);
        DB::table('communities')->insert([

            'name'=>'gogo',
            // 'creation_date' => date('Y-m-d H:i:s')

        ]);
        DB::table('communities')->insert([

            'name'=>'wawoooo',
            // 'creation_date' => date('Y-m-d H:i:s')

        ]);
    }
}
