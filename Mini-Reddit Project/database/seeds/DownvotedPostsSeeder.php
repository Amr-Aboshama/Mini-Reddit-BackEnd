<?php

use Illuminate\Database\Seeder;

class DownvotedPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('downvoted_posts')->insert([
            'user_name' => 'amr',
            'link_id' => 1
        ]);
        /*for ($counter=0; $counter < 12; $counter++)
        {
            DB::table('DownvotedPosts')->insert([
              'user_name' => Str::random(10),
              'display_name' => Str::random(10),
              'email' => Str::random(10).'@mail.com',
              'password' => bcrypt(Str::random(10)),
            ]);
        }*/
    }
}
