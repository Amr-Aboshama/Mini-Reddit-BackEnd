<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Blocking;
use App\Following;

class UnfollowUserTest extends TestCase
{
    public function testUnAuthorizedUser()
    {
        $this->json('POST', 'api/auth/unfollow', [], [])
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
        $this->json('POST', 'api/auth/unfollow', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $payload = ['username' => ''];
        $this->json('POST', 'api/auth/unfollow', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
    }

    public function testUnfollowWithBlocked()
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

        $this->json('POST', 'api/auth/unfollow', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
        $user2->delete();
    }

    public function testUnfollowWithBlocking()
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

        $this->json('POST', 'api/auth/unfollow', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
        $user2->delete();
    }


    public function testAlreadyUnfollowingUser()
    {
        $user1 = User::storeUser([
            'username' => 'testfollow3',
            'password' => 'armne123456',
            'email' => 'testfollow3@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testfollow4',
            'password' => 'armne123456',
            'email' => 'testfollow4@test.com'
        ]);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];
        $this->json('POST', 'api/auth/unfollow', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "Already unfollowing"
            ]);

        $user1->delete();
        $user2->delete();
    }

    public function testSuccessfulFollowing()
    {
        $user1 = User::storeUser([
            'username' => 'testfollow5',
            'password' => 'armne123456',
            'email' => 'testfollow5@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testfollow6',
            'password' => 'armne123456',
            'email' => 'testfollow6@test.com'
        ]);

        Following::createFollow($user1->username, $user2->username);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];
        $this->json('POST', 'api/auth/unfollow', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        $data = ['follower_username' => $user1->username, 'followed_username' => $user2->username];
        $this->assertDatabaseMissing('followings', $data);

        $user1->delete();
        $user2->delete();
    }
}
