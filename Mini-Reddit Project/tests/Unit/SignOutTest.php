<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class SignOutTest extends TestCase
{
    /*
     * Test for invalid signout
     * -> Not authenticated
     */
    public function testInvalidSignOut()
    {
        $user = new \App\User;
        $user = $user->storeUser([
          'username' => 'testo',
          'email' => 'testo@test.com',
          'password' => '123456789',
          'password_confirmation' => '123456789'
        ]);

        $token = auth()->login($user);
        auth()->logout();
        $this->InvalidResponse([]);
        $this->InvalidResponse([$token]);
        $user->delete();
    }


    /**
     * Test for a valid authenticated (a.k.a. logged in) user signout
     * $headers => Holds the token to authenticate
     */
    public function testValidSignOut()
    {
        $user = User::storeUser([
              'username' => 'testo2',
              'email' => 'testo2@test.com',
              'password' => 'armne123456',
          ]);

        $token = auth()->login($user);

        $headers = [$token];

        $this->json('POST', 'api/auth/signOut', [], $headers)
            ->assertStatus(200)
            ->assertJson([
              'success' => 'true'
            ]);

        $user->delete();
    }

    /**
     * Utilitiy function to test invalid signout
     * $headers => Holds the token to authenticate
     */
    public function InvalidResponse($headers)
    {
        $this->json('POST', 'api/auth/signOut', [], $headers)
            ->assertStatus(401)
            ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
            ]);
    }
}
