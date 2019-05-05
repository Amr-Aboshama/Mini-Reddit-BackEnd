<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Message;
use App\Link;

class ViewUserMessageTest extends TestCase
{
    /**
     * Test for an unauthorized action to return a specific message
     */
    public function testUnauthorizedReturnOfUserMessage()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($receiveruser);
        $headers = [$token];
        
        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii', 'test_subject');

        auth()->logout();

        $this->json('GET', 'api/v1/auth/viewUserMessage', ['message_id'=>$message->message_id], $headers)
            ->assertStatus(401);

        $senderuser->delete();
        $receiveruser->delete();
    }

    /**
     * Test for an unvalid action to return a specific message
     */
    public function testNoMessage()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);


        $token = auth()->login($receiveruser);
        $headers = [$token];

        
        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii', 'test_subject');

       

        $this->json('GET', 'api/v1/auth/viewUserMessage', ['message_id'=>''], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "message doesn't exist"
            ]);



        $this->json('GET', 'api/v1/auth/viewUserMessage', [], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "message doesn't exist"
            ]);

        $this->json('GET', 'api/v1/auth/viewUserMessage', ['message_id'=>$message->message_id+1], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "message doesn't exist"
            ]);
    

        

        $senderuser->delete();
        $receiveruser->delete();
    }


    /**
     * Test for an valid action to return a specific message
     */
    public function testValidReturnOfUserMessage()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);


        $token = auth()->login($receiveruser);
        $headers = [$token];

        
        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii', 'test_subject');


        $this->json('GET', 'api/v1/auth/viewUserMessage', ['message_id'=>$message->message_id], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
                "username2" => "testo",
                "user_photo" => null,
                'message_subject'=> 'test_subject',
                "message_content" => "test_hii",
                "duration" => link::duration($message->message_date)
            ]);

        $senderuser->delete();
        $receiveruser->delete();
    }
}
