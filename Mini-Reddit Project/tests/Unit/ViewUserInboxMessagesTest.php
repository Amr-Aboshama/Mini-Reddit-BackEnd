<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Message;
use App\Link;

class ViewUserInboxMessagesTest extends TestCase
{
    /**
     * Test for an unauthorized action to return user inbox messages
     */
    public function testUnauthorizedReturnOfUserInboxMessages()
    {

        $senderuser1 = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $senderuser2 = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser = User::storeUser([
            'username' => 'testooo',
            'email' => 'testooo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($receiveruser);
        $headers = [$token];
        auth()->logout();


        
        $message1= Message::createDummyMessage($senderuser1->username, $receiveruser->username, 'test_hii1', 'test_subject');

        $message2= Message::createDummyMessage($senderuser2->username, $receiveruser->username, 'test_hii2', 'test_subject');

       

        $this->json('GET', 'api/v1/auth/viewUserInboxMessages', ['state'=>3], $headers)
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);

        $senderuser1->delete();
        $senderuser2->delete();
        $receiveruser->delete();
    }

    /**
     * Test for an unvalid action to return a inbox messages
     */
    public function testNoState()
    {

        
        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);


        $token = auth()->login($receiveruser);
        $headers = [$token];


        $this->json('GET', 'api/v1/auth/viewUserInboxMessages', ['state'=>''], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "state does not exist"
            ]);



        $this->json('GET', 'api/v1/auth/viewUserInboxMessages', [], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "state does not exist"
            ]);

        
        $receiveruser->delete();
    }

    /**
     * Test for an unvalid action to return a inbox messages - undefined state
     */
    public function testUndefinedState()
    {

        
        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);


        $token = auth()->login($receiveruser);
        $headers = [$token];


        $this->json('GET', 'api/v1/auth/viewUserInboxMessages', ['state'=>5], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "undefined state"
            ]);

        
        $receiveruser->delete();
    }



    /**
     * Test for a valid action to return user inbox messages
     */
    public function testValidReturnOfUserSentMessages()
    {

        $senderuser1 = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $senderuser2 = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser = User::storeUser([
            'username' => 'testooo',
            'email' => 'testooo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($receiveruser);
        $headers = [$token];


        
        $message1= Message::createDummyMessage($senderuser1->username, $receiveruser->username, 'test_hii1', 'test_subject');


        $message2= Message::createDummyMessage($senderuser2->username, $receiveruser->username, 'test_hii2', 'test_subject');



        $this->json('GET', 'api/v1/auth/viewUserInboxMessages', ['state' => 3], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
                "messages" => [[
                    "sender_name" => "testo",
                    "sender_photo" => null,
                    "message_subject" => 'test_subject',
                    "message_content" => "test_hii1",
                    "message_id" => $message1->message_id,
                    "duration" => link::duration($message1->message_date)

                ],[
                    "sender_name" => "testoo",
                    "sender_photo" => null,
                    "message_subject" => 'test_subject',
                    "message_content" => "test_hii2",
                    "message_id" => $message2->message_id,
                    "duration" => link::duration($message2->message_date)

                ]]
            ]);



        $senderuser1->delete();
        $senderuser2->delete();
        $receiveruser->delete();
    }




}
