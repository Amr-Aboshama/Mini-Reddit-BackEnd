<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Community;

class ViewCommunityInformationTest extends TestCase
{
    public function testDataMissed()
    {

      $community1 = Community::createDummyCommunity('testkokowawa');
      $payload = [];
      $this->json('get', 'api/v1/unauth/communityInformation', $payload, [])
          ->assertStatus(422)
          ->assertJson([
              "success" => "false",
              "error" => "Invalid or some data missed"
          ]);


      $community1->delete();
    }
    public function testCommunityNonExistance()
    {

      $community1 = Community::createDummyCommunity('testkokowawa');
      $community_idd=$community1->community_id;
      $community1->delete();
      $payload = ['community_id'=>$community_idd];
      $this->json('get', 'api/v1/unauth/communityInformation', $payload, [])
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "community doesn't exist"
          ]);
    }

    public function testSuccess()
    {

      $community1 = Community::createDummyCommunity('testkokowawa');
      $payload = ['community_id'=>$community1->community_id];
      $this->json('get', 'api/v1/unauth/communityInformation', $payload, [])
          ->assertStatus(200)
          ->assertJson([
              "success" => "true",
              "name" =>   $community1->name,
              "rules"=> $community1->rules,
              "desription"=>$community1->description,
              "num_subscribes"=>0,
              "banner"=>$community1->community_banner,
              "logo"=>$community1->community_logo,
              "subscribed"=>false,
              "moderator"=>false
          ]);

      $community1->delete();
    }
}
