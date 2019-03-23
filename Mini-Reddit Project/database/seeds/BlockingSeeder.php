<?php

use Illuminate\Database\Seeder;

class BlockingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('blockings')->insert([

        'blocker_username'=>'ahmed',
        'blocked_username' =>'amro'

      ]);

      DB::table('blockings')->insert([

        'blocker_username'=>'amro',
        'blocked_username' =>'reham'

      ]);

      DB::table('blockings')->insert([

        'blocker_username'=>'menna',
        'blocked_username' =>'nour'

      ]);
    }
}
