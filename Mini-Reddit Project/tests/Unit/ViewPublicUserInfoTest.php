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
     */
    public function testValidReturnOfUserPublicInfo()
    {
        $user1 = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
          ]);

        $this->json('GET', 'api/unauth/viewPublicUserInfo', ['username'=>'testo1'])
            ->assertStatus(200)
            ->assertJson($this->validReturn("testo1"));

        $user1->delete();
    }

    /**
     * Test for an unvalid action to return user public info (user does not exist)
     * $headers => Holds the token to authenticate
     */
    public function testNonexistingUserPublicInfo()
    {
        $this->json('GET', 'api/unauth/viewPublicUserInfo', [])
            ->assertStatus(403)
            ->assertJson([
              'success' => 'false',
              "error" => "username doesn't exist"
            ]);

        $this->json('GET', 'api/unauth/viewPublicUserInfo', ['username'=>'nonexistinguser'])
            ->assertStatus(403)
            ->assertJson([
              'success' => 'false',
              "error" => "username doesn't exist"
            ]);
    }

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
