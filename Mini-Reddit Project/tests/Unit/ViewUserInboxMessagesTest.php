<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Message;

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

       

        $this->json('GET', 'api/auth/viewUserMessage', ['state'=>3], $headers)
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);

        $senderuser1->delete();
        $senderuser2->delete();
        $receiveruser->delete();
    }

}
