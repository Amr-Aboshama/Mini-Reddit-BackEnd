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
            'message_subject' => 'hey',
            'content' => 'heeyy'

        ]);

        DB::table('messages')->insert([

            'sender_username' => 'nour',
            'receiver_username' => 'menna',
            'message_subject' => 'hey back',
            'content' => 'heeyy back'

        ]);

        DB::table('messages')->insert([

            'sender_username' => 'menna',
            'receiver_username' => 'reham',
            'message_subject' => 'hi',
            'content' => 'hiii'

        ]);

        DB::table('messages')->insert([

            'sender_username' => 'reham',
            'receiver_username' => 'menna',
            'message_subject' => 'hi back',
            'content' => 'hiii back'

        ]);

        

    }
}
