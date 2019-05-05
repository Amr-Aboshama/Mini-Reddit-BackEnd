<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Message;
use App\Link;


class ViewUserSentMessagesTest extends TestCase
{
    /**
     * Test for an unauthorized action to return user sent messages
     */
    public function testUnauthorizedReturnOfUserSentMessages()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($senderuser);
        $headers = [$token];
        auth()->logout();

        $receiveruser1 = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser2 = User::storeUser([
            'username' => 'testooo',
            'email' => 'testooo@test.com',
            'password' => '123456789'
        ]);


        $message1= Message::createDummyMessage($senderuser->username, $receiveruser1->username, 'test_hii1', 'test_subject');


        $message2= Message::createDummyMessage($senderuser->username, $receiveruser2->username, 'test_hii2', 'test_subject');



        $this->json('GET', 'api/v1/auth/viewUserSentMessages', [], $headers)
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);

        $senderuser->delete();
        $receiveruser1->delete();
        $receiveruser2->delete();
    }

    /**
     * Test for a valid action to return user sent messages
     */
    public function testValidReturnOfUserSentMessages()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($senderuser);
        $headers = [$token];

        $receiveruser1 = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser2 = User::storeUser([
            'username' => 'testooo',
            'email' => 'testooo@test.com',
            'password' => '123456789'
        ]);


        
        $message1= Message::createDummyMessage($senderuser->username, $receiveruser1->username, 'test_hii1', 'test_subject');


        $message2= Message::createDummyMessage($senderuser->username, $receiveruser2->username, 'test_hii2', 'test_subject');



        $this->json('GET', 'api/v1/auth/viewUserSentMessages', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
                "messages" => [[
                	"receiver_name" => "testoo",
      	            "receiver_photo" => null,
                    "message_subject" => 'test_subject',
        	        "message_content" => "test_hii1",
                    "message_id" => $message1->message_id,
                    "duration" => link::duration($message1->message_date)

                ],[
                	"receiver_name" => "testooo",
      	            "receiver_photo" => null,
                    "message_subject" => 'test_subject',
        	        "message_content" => "test_hii2",
                    "message_id" => $message2->message_id,
                    "duration" => link::duration($message2->message_date)

                ]]
            ]);



        $senderuser->delete();
        $receiveruser1->delete();
        $receiveruser2->delete();
    }
}
