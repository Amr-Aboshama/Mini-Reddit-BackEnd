<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::storeUser([
        'user_name' => 'amro',
        'display_name' => 'Amr',
        'email' => 'amr@amr.com',
        'password' => '123456789',
      ]);
      User::storeUser([
        'user_name' => 'ahmed',
        'display_name' => 'essam',
        'email' => 'ahmed@ahmed.com',
        'password' => '123456789',
      ]);
      User::storeUser([
        'user_name' => 'menna',
        'display_name' => 'menna',
        'email' => 'menna@menna.com',
        'password' => '123456789',
      ]);
      User::storeUser([
        'user_name' => 'nour',
        'display_name' => 'nour',
        'email' => 'nour@nour.com',
        'password' => '123456789',
      ]);
      User::storeUser([
        'user_name' => 'reham',
        'display_name' => 'reham',
        'email' => 'reham@reham.com',
        'password' => '123456789',
      ]);
      for ($counter=0; $counter < 10; $counter++)
      {
          User::storeUser([
            'user_name' => Str::random(10),
            'display_name' => Str::random(10),
            'email' => Str::random(10).'@mail.com',
            'password' => bcrypt(Str::random(10)),
          ]);
      }
    }
}
