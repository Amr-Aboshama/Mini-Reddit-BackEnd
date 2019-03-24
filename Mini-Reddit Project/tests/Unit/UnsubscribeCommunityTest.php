<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Community;
use App\Subscribtion;

class UnsubscribeCommunityTest extends TestCase
{
    public function testNoneExistanceOfCommunity()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['community_id' => 'lllll'];
        $this->json('DELETE', 'api/auth/unSubscribeCommunity', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "community doesn't exist"
            ]);

        auth()->logout();
        $user->delete();
    }

    public function testUnAuthorizationOfUser()
    {
        $community1 = Community::createDummyCommunity('testkokowawa');

        $payload = ['community_id' => $community1->community_id];
        $this->json('DELETE', 'api/auth/unSubscribeCommunity', $payload, [])
          ->assertStatus(401)
          ->assertJson([
              "success" => "false",
              "error" => "UnAuthorized"
          ]);

        $community1->delete();
    }

    public function testSuccessfulUnsubscribtion()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $community1 = Community::createDummyCommunity('testkokowawa');

        $token = auth()->login($user);
        $headers = [$token];

        $subscribtion1 = Subscribtion::createDummySubscribtion($community1->community_id, 'test99');

        $payload = ['community_id' => $community1->community_id];
        $this->json('DELETE', 'api/auth/unSubscribeCommunity', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        auth()->logout();
        $user->delete();
        $community1->delete();
    }

    public function testAlreadyUnsubscribed()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $community1 = Community::createDummyCommunity('testkokowawa');

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['community_id' => $community1->community_id];
        $this->json('DELETE', 'api/auth/unSubscribeCommunity', $payload, $headers)
              ->assertStatus(403)
              ->assertJson([
                  "success" => "false",
                  "error" => "user already is not subscribed in that community"
              ]);

        auth()->logout();
        $user->delete();
        $community1->delete();
    }
}
