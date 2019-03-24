<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class ViewPublicUserInfoTest extends TestCase
{
     /**
     * Test for a valid action to return user public info
     * $headers1 => Holds the token to authenticate $user1
     * $headers2 => Holds the token to authenticate $user2
     */
    public function testValidReturnOfUserPublicInfo()
    {
        $user1 = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
          ]);

        $user2 = User::storeUser([
            'username' => 'testo2',
            'email' => 'testo2@test.com',
            'password' => 'armne123456',
          ]);

        $token1 = auth()->login($user1);
        $headers1 = [$token1];

        $token2 = auth()->login($user2);
        $headers2 = [$token2];

        $this->json('GET', 'api/auth/viewPublicUserInfo', ['username'=>'testo2'], $headers1)
            ->assertStatus(200)
            ->assertJson($this->validReturn("testo2"));

        $this->json('GET', 'api/auth/viewPublicUserInfo', ['username'=>'testo1'], $headers1)
            ->assertStatus(200)
            ->assertJson($this->validReturn("testo1"));


        $user1->delete();
        $user2->delete();
    }

    /**
     * Test for an unvalid action to return user public info (user does not exist)
     * $headers => Holds the token to authenticate
     */
    public function testNonexistingUserPublicInfo()
    {
        $user = new \App\User;
        $user = $user->storeUser([
          'username' => 'testo',
          'email' => 'testo@test.com',
          'password' => '123456789'
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('GET', 'api/auth/viewPublicUserInfo', [], $headers)
            ->assertStatus(403)
            ->assertJson([
              'success' => 'false',
              "error" => "username doesn't exist"
            ]);

        $this->json('GET', 'api/auth/viewPublicUserInfo', ['username'=>'nonexistinguser'], $headers)
            ->assertStatus(403)
            ->assertJson([
              'success' => 'false',
              "error" => "username doesn't exist"
            ]);

        $user->delete();
    }

    /**
     * Test for an unvalid action to return user public info (user is not authorized to view the info)
     * $headers => Holds the token to authenticate
     */
    public function testUnauthorizedToViewUserPublicInfo()
    {
        $user = new \App\User;
        $user = $user->storeUser([
          'username' => 'testo',
          'email' => 'testo@test.com',
          'password' => '123456789'
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout();

        $this->json('GET', 'api/auth/viewPublicUserInfo', ['username'=>'testo'], $headers)
            ->assertStatus(401)
            ->assertJson([
              'success' => 'false',
              "error" => "UnAuthorized"
            ]);

        $user->delete();
    }

    /**
     * Utilitiy function to test invalid signout
     * $headers => Holds the token to authenticate
     */
    public function validReturn($username)
    {
        return [
            "success" => "true",
            "username" => $username,
         	"name" => null,
    	    "karma" => "0",
      		"cake_day" => null,
       		"about"=> null,
       		"photo_path" => null,
       		"cover_path" => null
            ];
    }

}
