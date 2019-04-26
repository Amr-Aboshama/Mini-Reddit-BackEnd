<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Message;


class SendMessageTest extends TestCase
{
    /**
     * Test for an unauthorized action to send a messages
     */
    public function testUnauthorizedSendMessage()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($senderuser);
        $headers = [$token];
        auth()->logout();

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii');

        $this->json('POST', 'api/auth/sendMessage', ['rec_username'=> $receiveruser->username,
                                                        'msg_content'=> 'test_hii'], $headers)
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);

        $senderuser->delete();
        $receiveruser->delete();
    }

    /**
     * Test for an unvalid action to send a messages
     */
    public function testNonExistanceOfName()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($senderuser);
        $headers = [$token];

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

        $receiveruser->delete();

        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii');

        $this->json('POST', 'api/auth/sendMessage', ['rec_username'=> $receiveruser->username,
                                                        'msg_content'=> 'test_hii'], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $this->json('POST', 'api/auth/sendMessage', ['rec_username'=> '',
                                                        'msg_content'=> 'test_hii'], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]); 
            
        $this->json('POST', 'api/auth/sendMessage', ['msg_content'=> 'test_hii'], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);        

        $senderuser->delete();
       
    }

    /**
     * Test for an unvalid action to send a messages - no message content
     */
    public function testNonExistanceOfMessageContent()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($senderuser);
        $headers = [$token];

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

       

        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii');

        $this->json('POST', 'api/auth/sendMessage', ['rec_username'=> $receiveruser->username,
                                                        'msg_content'=> ''], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "message must have a content"
            ]);

        $this->json('POST', 'api/auth/sendMessage', ['rec_username'=> $receiveruser->username], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "message must have a content"
            ]); 
            
                

        $senderuser->delete();
        $receiveruser->delete();
       
    }

    /**
     * Test for an valid action to send a messages 
     */
    public function testValidSendMessage()
    {

        $senderuser = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($senderuser);
        $headers = [$token];

        $receiveruser = User::storeUser([
            'username' => 'testoo',
            'email' => 'testoo@test.com',
            'password' => '123456789'
        ]);

       

        $message= Message::createDummyMessage($senderuser->username, $receiveruser->username, 'test_hii');

        $this->json('POST', 'api/auth/sendMessage', ['rec_username'=> $receiveruser->username,
                                                        'msg_content'=> 'test_hii'], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        $senderuser->delete();
        $receiveruser->delete();
       
    }
}
