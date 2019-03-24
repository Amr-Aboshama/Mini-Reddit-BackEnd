<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class SignInTest extends TestCase
{
    /**
     * Test invalid signin
     * -> Required data
     */
    public function testInvalidSignIn()
    {
        $this->MissedResponse(['username' => null, 'password' => null]);
        $this->MissedResponse(['username' => 'amroo', 'password' => null]);
        $this->MissedResponse(['username' => null, 'password' => '123456789']);
        $this->MissedResponse(['username' => 'amroo', 'password' => '1234567']);
        $this->MissedResponse(['username' => 'amr', 'password' => '12345678']);
    }

    /**
     * Test invalid signin
     * -> Mismatch of username and password
     */
    public function testUsernameAndPasswordMismatch()
    {
        $user = User::storeUser(['username' => 'testo','password' => 'armne123456','email' => 'testo@test.com']);

        $payload = ['username' => 'testo' . 'x', 'password' => 'armne123456'];

        $this->json('POST', 'api/unauth/signIn', $payload)
            ->assertStatus(404)
            ->assertJson([
                'success' => 'false',
                'error' => 'username and password don\'t matched'
            ]);

        $user->delete();
    }

    /**
     * Test for a successful signin
     */
    public function testValidSignIn()
    {
        $user = User::storeUser(['username' => 'testo','password' => 'armne123456','email' => 'testo@test.com']);

        $payload = ['username' => 'testo', 'password' => 'armne123456'];

        $this->json('POST', 'api/unauth/signIn', $payload)
            ->assertStatus(200)
            ->assertJson([
                'success' => 'true'
            ])
            ->assertJsonStructure([
                'token'
            ]);
        $user->delete();
    }

    /**
     * Utilitiy function to test invalid signin
     * $payload => Parameters of the request
     */
    public function MissedResponse($payload)
    {
        $this->json('POST', 'api/unauth/signIn', $payload)
            ->assertStatus(422)
            ->assertJson([
                'success' => 'false',
                'error' => 'Invalid or some data missed'
            ]);
    }
}
