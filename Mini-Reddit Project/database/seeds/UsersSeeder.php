<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        'user_name' => 'amr',
        'display_name' => 'Amr',
        'email' => 'amr@amr.com',
        'password' => bcrypt('123456789'),
      ]);
      for ($counter=0; $counter < 10; $counter++)
      {
          DB::table('users')->insert([
            'user_name' => Str::random(10),
            'display_name' => Str::random(10),
            'email' => Str::random(10).'@mail.com',
            'password' => bcrypt(Str::random(10)),
          ]);
      }
    }
}
