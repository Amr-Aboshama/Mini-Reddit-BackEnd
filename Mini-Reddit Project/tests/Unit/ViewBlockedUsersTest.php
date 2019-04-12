<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Blocking;

class ShowBlockedUsersTest extends TestCase
{
    public function testUnAuthorizedUser()
    {
        $this->json('GET', 'api/auth/blockedUsers', [], [])
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);
    }

    public function testSuccessfulView()
    {
        $user = array();
        $list = array();

        for ($i = 0; $i < 5; $i++) {
            $user[] = User::storeUser([
                'username' => "testblock$i",
                'password' => "armne123456",
                'email' => "testblock$i@test.com"
            ]);
            if ($i > 0) {
                Blocking::blockUser($user[0]->username, $user[$i]->username);
                $list[] = end($user)->username;
            }
        }


        $token = auth()->login($user[0]);
        $headers = [$token];

        $this->json('GET', 'api/auth/blockedUsers', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
                "blockedList" => $list
            ]);

        for ($i = 0; $i < 5; $i++) {
            $user[$i]->delete();
        }
    }
}
