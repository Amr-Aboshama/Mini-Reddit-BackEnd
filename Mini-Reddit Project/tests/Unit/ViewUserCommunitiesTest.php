<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Community;
use App\Subscribtion;

class ViewUserCommunitiesTest extends TestCase
{
    public function testNoneExistanceOfUser()
    {
        $payload = ['username' => 'lll'];
        $this->json('GET', 'api/unauth/viewUserCommunities', $payload)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "username doesn't exist"
            ]);
    }

    public function testRetrievingCommunities()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $community1 = Community::createDummyCommunity('testkokowawa');

        $community2 = Community::createDummyCommunity('testnocry');

        $subscribtion1 = Subscribtion::createDummySubscribtion($community1->community_id, 'test99');
        $subscribtion2 = Subscribtion::createDummySubscribtion($community2->community_id, 'test99');

        $payload = ['username' => 'test99'];
        $this->json('GET', 'api/unauth/viewUserCommunities', $payload)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
                "communities" => [[
                    "community_id" => $community1->community_id,
                ],[
                    "community_id" => $community2->community_id,
                ]]
            ]);
        //$subscribtion1->delete();
        //$subscribtion2->delete();
        $community2->delete();
        $community1->delete();
        $user->delete();
    }
}
