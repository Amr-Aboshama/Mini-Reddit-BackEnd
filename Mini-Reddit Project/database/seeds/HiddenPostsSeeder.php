<?php

use Illuminate\Database\Seeder;

class HiddenPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('hidden_posts')->insert([

              'username'=>'ahmed',
              'link_id' => 1
          ]);

          DB::table('hidden_posts')->insert([

              'username'=>'ahmed',
              'link_id' => 2
          ]);

          DB::table('hidden_posts')->insert([

              'username'=>'ahmed',
              'link_id' => 3
          ]);

          DB::table('hidden_posts')->insert([

              'username'=>'amro',
              'link_id' => 4
          ]);

          DB::table('hidden_posts')->insert([

              'username'=>'menna',
              'link_id' => 1
          ]);
    }
}
