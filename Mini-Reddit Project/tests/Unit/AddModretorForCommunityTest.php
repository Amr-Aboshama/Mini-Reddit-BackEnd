<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Community;
use App\ModerateCommunity;

class AddModretorForCommunityTest extends TestCase
{
    public function testDataMissed()
    {
      $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
      $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

      $token = auth()->login($user);
      $headers = [$token];

      $community1 = Community::createDummyCommunity('testkokowawa');
      ModerateCommunity::store($community1->community_id, $user->username);

      $payload = ['moderator_username'=>$user2->username];
      $this->json('POST', 'api/auth/addModerator', $payload, $headers)
          ->assertStatus(422)
          ->assertJson([
              "success" => "false",
              "error" => "Invalid or some data missed"
          ]);


      $community1->delete();
      auth()->logout();
      $user->delete();
      $user2->delete();

    }
    public function testUnAuthorizationOfUser()
    {
        $community1 = Community::createDummyCommunity('testkokowawa');
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $payload = ['community_id' => $community1->community_id,'moderator_username'=>$user->username];
        $this->json('POST', 'api/auth/addModerator', $payload, [])
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);
        $user->delete();
        $community1->delete();
    }


    public function testUnexistanceOfUser()
    {
      $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

      $token = auth()->login($user);
      $headers = [$token];

      $community1 = Community::createDummyCommunity('testkokowawa');
      ModerateCommunity::store($community1->community_id, $user->username);

      $payload = ['community_id' => $community1->community_id,'moderator_username'=>'no'];
      $this->json('POST', 'api/auth/addModerator', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "user doesn't exist"
          ]);


      $community1->delete();
      auth()->logout();
      $user->delete();
    }

    public function testUnexistanceOfCommunity()
    {
      $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
      $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

      $token = auth()->login($user);
      $headers = [$token];

      $community1 = Community::createDummyCommunity('testkokowawa');
      $community_idd=$community1->community_id;
      $community1->delete();

      $payload = ['community_id' =>$community_idd ,'moderator_username'=>$user2->username];
      $this->json('POST', 'api/auth/addModerator', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "community doesn't exist"
          ]);

      auth()->logout();
      $user->delete();
      $user2->delete();
    }

    public function testAlreadyModerate()
    {
      $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
      $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

      $token = auth()->login($user);
      $headers = [$token];

      $community1 = Community::createDummyCommunity('testkokowawa');

      ModerateCommunity::store($community1->community_id, $user->username);
      ModerateCommunity::store($community1->community_id, $user2->username);
      $payload = ['community_id' =>$community1->community_id ,'moderator_username'=>$user2->username];
      $this->json('POST', 'api/auth/addModerator', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "user is already a moderator in that community"
          ]);


      $community1->delete();
      auth()->logout();
      $user->delete();
      $user2->delete();
    }

    public function testNonModerator()
    {
      $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
      $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

      $token = auth()->login($user);
      $headers = [$token];

      $community1 = Community::createDummyCommunity('testkokowawa');

      $payload = ['community_id' =>$community1->community_id ,'moderator_username'=>$user2->username];
      $this->json('POST', 'api/auth/addModerator', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "you are not a modirator to add another modirator"
          ]);


      $community1->delete();
      auth()->logout();
      $user->delete();
      $user2->delete();
    }

    public function testSuccess()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $user2 = User::storeUser(['username' => 'test55', 'password' => 'armne123456', 'email' => 'test55@test.com']);

        $token = auth()->login($user);
        $headers = [$token];

        $community1 = Community::createDummyCommunity('testkokowawa');
        ModerateCommunity::store($community1->community_id, $user->username);

        $payload = ['community_id' =>$community1->community_id ,'moderator_username'=>$user2->username];
        $this->json('POST', 'api/auth/addModerator', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true",
            ]);


        $community1->delete();
        auth()->logout();
        $user->delete();
        $user2->delete();

    }



}
