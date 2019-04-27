<?php

use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([

            'sender_username' => 'menna',
            'receiver_username' => 'nour',
            'content' => 'heeyy'

        ]);

        DB::table('messages')->insert([

            'sender_username' => 'menna',
            'receiver_username' => 'reham',
            'content' => 'hiii'

        ]);

    }
}
