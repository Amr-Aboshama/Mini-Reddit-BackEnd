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

        'follower_username'=>'ahmed',
        'followed_username' =>'amro'

      ]);

      DB::table('blockings')->insert([

        'follower_username'=>'amro',
        'followed_username' =>'reham'

      ]);

      DB::table('blockings')->insert([

        'follower_username'=>'menna',
        'followed_username' =>'nour'

      ]);
    }
}
