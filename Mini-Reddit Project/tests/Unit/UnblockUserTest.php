<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Blocking;
use App\Following;

class UnblockUserTest extends TestCase
{
    public function testUnAuthorizedUser()
    {
        $this->json('POST', 'api/auth/unblockUser', [], [])
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);
    }

    public function testNonExistingUser()
    {
        $user1 = User::storeUser([
            'username' => 'testblock',
            'password' => 'armne123456',
            'email' => 'testblock@test.com'
        ]);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => 'tes'];
        $this->json('POST', 'api/auth/unblockUser', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $payload = ['username' => ''];
        $this->json('POST', 'api/auth/unblockUser', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
    }

    public function testUnblockingUserThatBlockedBy()
    {
        $user1 = User::storeUser([
            'username' => 'testblock0',
            'password' => 'armne123456',
            'email' => 'testblock0@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testblock2',
            'password' => 'armne123456',
            'email' => 'testblock2@test.com'
        ]);

        Blocking::blockUser($user2->username, $user1->username);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];
        $this->json('POST', 'api/auth/unblockUser', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);

        $user1->delete();
        $user2->delete();
    }

    public function testAlreadyUnblockedUser()
    {
        $user1 = User::storeUser([
            'username' => 'testblock3',
            'password' => 'armne123456',
            'email' => 'testblock3@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testblock4',
            'password' => 'armne123456',
            'email' => 'testblock4@test.com'
        ]);

        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];
        $this->json('POST', 'api/auth/unblockUser', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "Already unblocked"
            ]);

        $user1->delete();
        $user2->delete();
    }

    public function testSuccessfulUnblocking()
    {
        $user1 = User::storeUser([
            'username' => 'testblock5',
            'password' => 'armne123456',
            'email' => 'testblock5@test.com'
        ]);

        $user2 = User::storeUser([
            'username' => 'testblock6',
            'password' => 'armne123456',
            'email' => 'testblock6@test.com'
        ]);

        Blocking::blockUser($user1->username, $user2->username);


        $token = auth()->login($user1);

        $headers = [$token];
        $payload = ['username' => $user2->username];
        $this->json('POST', 'api/auth/unblockUser', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);


        $data = ['blocker_username' => $user1->username, 'blocked_username' => $user2->username];
        $this->assertDatabaseMissing('blockings', $data);

        $user1->delete();
        $user2->delete();
    }
}
