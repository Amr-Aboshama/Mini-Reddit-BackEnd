<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class ViewPrivateUserInfoTest extends TestCase
{
    /**
     * Test for a valid action to return user private info
     * $headers => Holds the token to authenticate
     */
    public function testValidReturnOfUserPrivateInfo()
    {
        $user = User::storeUser([
            'username' => 'testo2',
            'email' => 'testo2@test.com',
            'password' => 'armne123456',
          ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('GET', 'api/auth/viewPrivateUserInfo', [], $headers)
            ->assertStatus(200)
            ->assertJson([
              "success" => "true",
              "email" => "testo2@test.com"
            ]);

        $user->delete();
    }

    /**
     * Test for an unvalid action to return user private info
     * $headers => Holds the token to authenticate
     */
    public function testUnvalidReturnOfUserPrivateInfo()
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

        $returnedjson = ['success' => 'false', 'error' => 'UnAuthorized'];

        $this->json('GET', 'api/auth/viewPrivateUserInfo', [],  $headers)
            ->assertStatus(401)
            ->assertJson($returnedjson);

        $this->json('GET', 'api/auth/viewPrivateUserInfo', [], [])
            ->assertStatus(401)
            ->assertJson($returnedjson);    
        
        $this->json('GET', 'api/auth/viewPrivateUserInfo', [])
            ->assertStatus(401)
            ->assertJson($returnedjson);

        $user->delete();
    }

    
}
