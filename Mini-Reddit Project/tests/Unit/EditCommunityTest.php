<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use App\Community;
use App\User;
use App\ModerateCommunity;

class EditCommunityTest extends TestCase
{
    public function testUnAuthorizationOfUser()
    {
        $community1 = Community::createDummyCommunity('testkokowawa');
        $payload = ['community_id' => $community1->community_id,'rules_content' => "nnnnn",'des_content' => "llllll",
            'banner' => UploadedFile::fake()->image('random.jpg'),'logo' => UploadedFile::fake()->image('random.jpg')];

        $this->json('POST', 'api/auth/editCommunity', $payload, [])
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

        $payload = ['community_id' => (Community::getMaxId() + 1),'rules_content' => "nnnnn",'des_content' => "llllll",
            'banner' => UploadedFile::fake()->image('random.jpg'),'logo' => UploadedFile::fake()->image('random.jpg')];

        $this->json('POST', 'api/auth/editCommunity', $payload, $headers)
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
        $payload = ['community_id' => $community1->community_id,'rules_content' => "nnnnn",'des_content' => "llllll",
            'banner' => UploadedFile::fake()->image('random.jpg'),'logo' => UploadedFile::fake()->image('random.jpg')];

        $this->json('POST', 'api/auth/editCommunity', $payload, $headers)
        ->assertStatus(403)
        ->assertJson([
            "success" => "false",
            "error" => "this user is not a moderator"
        ]);

        $community1->delete();
        auth()->logout();
        $user->delete();
    }

    public function testUnValidLogo()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];

        $community1 = Community::createDummyCommunity('testkokowawa');

        ModerateCommunity::store($community1->community_id, $user->username);

        $payload = ['community_id' => $community1->community_id,'rules_content' => "nnnnn",'des_content' => "llllll",
            'banner' => UploadedFile::fake()->image('random.jpg'),'logo' => 'kkk'];

        $this->json('POST', 'api/auth/editCommunity', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              "success" => "false",
              "error" => "invalid logo"
          ]);


        $community1->delete();
        auth()->logout();
        $user->delete();
    }
    public function testUnValidbanner()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];

        $community1 = Community::createDummyCommunity('testkokowawa');

        ModerateCommunity::store($community1->community_id, $user->username);

        $payload = ['community_id' => $community1->community_id,'rules_content' => "nnnnn",'des_content' => "llllll",
            'banner' => 'kkk','logo' => UploadedFile::fake()->image('random.jpg')];

        $this->json('POST', 'api/auth/editCommunity', $payload, $headers)
        ->assertStatus(403)
        ->assertJson([
            "success" => "false",
            "error" => "invalid banner"
        ]);


        $community1->delete();
        auth()->logout();
        $user->delete();
    }

    public function testSuccessEdit()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);
        $token = auth()->login($user);
        $headers = [$token];

        $community1 = Community::createDummyCommunity('testkokowawa');

        ModerateCommunity::store($community1->community_id, $user->username);

        $payload = ['community_id' => $community1->community_id,'rules_content' => "nnnnn",'des_content' => "llllll",
            'banner' => UploadedFile::fake()->image('random.jpg'),'logo' => UploadedFile::fake()->image('random.jpg')];

        $this->json('POST', 'api/auth/editCommunity', $payload, $headers)
        ->assertStatus(200)
        ->assertJson([
            "success" => "true"
        ]);
        $comm = Community::getCommunity($community1->community_id);
        $this->assertEquals($comm->name, 'testkokowawa');
        $this->assertEquals($comm->rules, "nnnnn");
        $this->assertEquals($comm->description, 'llllll');
        $this->assertEquals($comm->community_logo, $comm->community_id.'logo.jpg');
        $this->assertEquals($comm->community_banner, $comm->community_id.'banner.jpg');


        $community1->delete();
        auth()->logout();
        $user->delete();
    }
}
