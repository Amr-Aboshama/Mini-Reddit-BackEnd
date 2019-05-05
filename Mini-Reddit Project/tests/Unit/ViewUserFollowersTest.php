<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Blocking;
use App\Following;

class ViewUserFollowersTest extends TestCase
{
    public function testUnAuthorizedUser()
    {
        $this->json('GET', 'api/v1/auth/followers', [], [])
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);
    }

    public function testNonExistingUser()
    {
        $user1 = User::storeUser([
            'username' => 'testfollow',
            'password' => 'armne123456',
            'email' => 'testfollow@test.com'
        ]);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => 'tes'];
        $this->json('GET', 'api/v1/auth/followers', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $payload = ['username' => ''];
        $this->json('GET', 'api/v1/auth/followers', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
    }

    public function testFollowWithBlocked()
    {
        $user1 = User::storeUser([
            'username' => 'testfollow0',
            'password' => 'armne123456',
            'email' => 'testfollow0@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testfollow2',
            'password' => 'armne123456',
            'email' => 'testfollow2@test.com'
        ]);

        Blocking::blockUser($user2->username, $user1->username);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];

        $this->json('GET', 'api/v1/auth/followers', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
        $user2->delete();
    }

    public function testFollowWithBlocking()
    {
        $user1 = User::storeUser([
            'username' => 'testfollow7',
            'password' => 'armne123456',
            'email' => 'testfollow7@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testfollow8',
            'password' => 'armne123456',
            'email' => 'testfollow8@test.com'
        ]);

        Blocking::blockUser($user1->username, $user2->username);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];

        $this->json('GET', 'api/v1/auth/followers', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
        $user2->delete();
    }

    public function testSuccessfulView()
    {
        $user = array();
        $list = array();

        for ($i = 0; $i < 6; $i++) {
            $user[] = User::storeUser([
                'username' => "testfollow$i",
                'password' => "armne123456",
                'email' => "testfollow$i@test.com"
            ]);
            if ($i > 1) {
                Following::createFollow($user[$i]->username, $user[1]->username);
                $list[] = end($user)->username;
            }
        }


        $token = auth()->login($user[0]);
        $headers = [$token];
        $payload = ['username' => $user[1]->username];

        $this->json('GET', 'api/v1/auth/followers', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
                "follwersList" => $list
            ]);

        for ($i = 0; $i < 6; $i++) {
            $user[$i]->delete();
        }
    }
}
