<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Community;

class CreateCommunityTest extends TestCase
{
    public function testUnAuthorizationOfUser()
    {
        $payload = ['community_name' => 'testkokowawa'];
        $this->json('POST', 'api/auth/createCommunity', $payload, [])
          ->assertStatus(401)
          ->assertJson([
              "success" => "false",
              "error" => "UnAuthorized"
          ]);
    }
    public function testNonExceedingThirtyDays()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['community_name' => 'testkokowawa'];
        $this->json('POST', 'api/auth/createCommunity', $payload, $headers)
        ->assertStatus(401)
        ->assertJson([
            "success" => "false",
            "error" => "you have to complete 30 days "
        ]);

        auth()->logout();
        $user->delete();
    }

    public function testMissingContents()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $user->cake_date = now()->subDays(50);
        $user->save();

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['community_name' => ''];
        $this->json('POST', 'api/auth/createCommunity', $payload, $headers)
        ->assertStatus(403)
        ->assertJson([
            "success" => "false",
            "error" => "some of the needed contents are missed"
        ]);
        $payload = [];
        $this->json('POST', 'api/auth/createCommunity', $payload, $headers)
        ->assertStatus(403)
        ->assertJson([
            "success" => "false",
            "error" => "some of the needed contents are missed"
        ]);
        auth()->logout();
        $user->delete();
    }


    public function testCommunityNameExist()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $user->cake_date = now()->subDays(50);
        $user->save();

        $token = auth()->login($user);
        $headers = [$token];

        $community1 = Community::createDummyCommunity('testkokowawa');

        $payload = ['community_name' => 'testkokowawa'];
        $this->json('POST', 'api/auth/createCommunity', $payload, $headers)
        ->assertStatus(403)
        ->assertJson([
            "success" => "false",
            "error" => "this name already exists"
        ]);

        $community1->delete();
        auth()->logout();
        $user->delete();
    }

    public function testCommunityCreation()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $user->cake_date = now()->subDays(50);
        $user->save();

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['community_name' => 'testkokowawa'];
        $this->json('POST', 'api/auth/createCommunity', $payload, $headers)
        ->assertStatus(200)
        ->assertJson([
            "success" => "true",
            "community_id" => Community::getCommunityByName('testkokowawa')->community_id
        ]);
        $id = Community::getCommunityByName('testkokowawa')->community_id;
        Community::removeCommunity($id);

        auth()->logout();
        $user->delete();
    }
}
