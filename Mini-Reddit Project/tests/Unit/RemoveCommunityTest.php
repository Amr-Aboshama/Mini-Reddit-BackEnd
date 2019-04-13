<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Community;
use App\User;
use App\ModerateCommunity;

class RemoveCommunityTest extends TestCase
{
    public function testUnAuthorizationOfUser()
    {
        $community1 = Community::createDummyCommunity('testkokowawa');

        $payload = ['community_id' => $community1->community_id ];
        $this->json('POST', 'api/auth/removeCommunity', $payload, [])
          ->assertStatus(401)
          ->assertJson([
              "success" => "false",
              "error" => "UnAuthorized"
          ]);

        $community1->delete();
    }
    public function testNonExistanceOfCommunity()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['community_id' => (Community::getMaxId() + 1) ];
        $this->json('POST', 'api/auth/removeCommunity', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "community doesn't exist"
          ]);

        auth()->logout();
        $user->delete();
    }

    public function testUserNotModirator()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];


        $community1 = Community::createDummyCommunity('testkokowawa');

        $payload = ['community_id' => $community1->community_id ];

        $this->json('POST', 'api/auth/removeCommunity', $payload, $headers)
        ->assertStatus(403)
        ->assertJson([
            "success" => "false",
            "error" => "this user is not a moderator"
        ]);

        $community1->delete();
        auth()->logout();
        $user->delete();
    }

    public function testSuccessRemoval()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];

        $community1 = Community::createDummyCommunity('testkokowawa');

        ModerateCommunity::store($community1->community_id, $user->username);

        $payload = ['community_id' => $community1->community_id ];

        $this->json('POST', 'api/auth/removeCommunity', $payload, $headers)
        ->assertStatus(200)
        ->assertJson([
            "success" => "true"
        ]);

        $community1->delete();
        auth()->logout();
        $user->delete();
    }
}
