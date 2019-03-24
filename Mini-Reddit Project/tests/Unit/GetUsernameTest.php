<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class GetUsernameTest extends TestCase
{

    //this function is to test getting the username of an authorized user
    public function testGetUsernameOfAuthorizedUser()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('GET', 'api/auth/getUsername', [], $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true',
              'username' => $user->username
          ]);
        $user->delete();
    }

    //this function is to test getting the username of an unauthorized user
    public function testGetUsernameOfUnauthorizedUser()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $this->json('GET', 'api/auth/getUsername', [], $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
    }
}
