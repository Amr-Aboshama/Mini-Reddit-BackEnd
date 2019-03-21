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
        'username' => 'amro',
        'display_name' => 'amro',
        'email' => 'amro@amro.com',
        'password' => '123456789',
      ]);
        User::storeUser([
        'username' => 'ahmed',
        'display_name' => 'essam',
        'email' => 'ahmed@ahmed.com',
        'password' => '123456789',
      ]);
        User::storeUser([
        'username' => 'menna',
        'display_name' => 'menna',
        'email' => 'menna@menna.com',
        'password' => '123456789',
      ]);
        User::storeUser([
        'username' => 'nour',
        'display_name' => 'nour',
        'email' => 'nour@nour.com',
        'password' => '123456789',
      ]);
        User::storeUser([
        'username' => 'reham',
        'display_name' => 'reham',
        'email' => 'reham@reham.com',
        'password' => '123456789',
      ]);
        for ($counter=0; $counter < 10; $counter++) {
            User::storeUser([
            'username' => Str::random(10),
            'display_name' => Str::random(10),
            'email' => Str::random(10).'@mail.com',
            'password' => bcrypt(Str::random(10)),
          ]);
        }
    }
}
