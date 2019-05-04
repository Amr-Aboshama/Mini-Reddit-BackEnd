<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Community;
use App\ModerateCommunity;

class ViewModeratorsCommunityTest extends TestCase
{
    public function testDataMissed()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

        $community1 = Community::createDummyCommunity('testkokowawa');
        ModerateCommunity::store($community1->community_id, $user->username);
        ModerateCommunity::store($community1->community_id, $user2->username);

        $payload = [];
        $this->json('get', 'api/unauth/viewModerators', $payload,[])
            ->assertStatus(422)
            ->assertJson([
                "success" => "false",
                "error" => "Invalid or some data missed"
            ]);


        $community1->delete();
        $user->delete();
        $user2->delete();

      }
      public function testCommunityExistance()
      {
          $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
          $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

          $community1 = Community::createDummyCommunity('testkokowawa');
          $community_idd=$community1->community_id;
          $community1->delete();

          $payload = ['community_id'=>$community_idd];
          $this->json('get', 'api/unauth/viewModerators', $payload,[])
              ->assertStatus(403)
              ->assertJson([
                  "success" => "false",
                  "error" => "community doesn't exist"
              ]);



          $user->delete();
          $user2->delete();

        }
        public function testSuccess()
        {
            $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
            $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

            $community1 = Community::createDummyCommunity('testkokowawa');
            ModerateCommunity::store($community1->community_id, $user->username);
            ModerateCommunity::store($community1->community_id, $user2->username);

            $payload = ['community_id'=>$community1->community_id];
            $this->json('get', 'api/unauth/viewModerators', $payload,[])
                ->assertStatus(200)
                ->assertJson([
                    "success" => "true",
                    "moderators"=>[[
                      "moderator_username" =>$user2->username ,
                      "moderator_photo"=>$user2->photo_url,
                    ],[

                        "moderator_username" => $user->username ,
                        "moderator_photo"=>$user->photo_url ,
                    ]]
                ]);


            $community1->delete();
            $user->delete();
            $user2->delete();

          }
}
