<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class SignUpTest extends TestCase
{
    /**
     * Test for invalid data for signup
     * -> Required data
     * -> Minimum Number of characters
     * -> Unique username and email
     * -> Password confirmation
     */
    public function testInvalidSignUp()
    {
        $this->MissedResponse(['username' => null, 'password' => null, 'email' => null, 'password_confirmation' => null]);
        $this->MissedResponse(['username' => null, 'password' => '123456789', 'email' => 'a@a.com', 'password_confirmation' => '123456789']);
        $this->MissedResponse(['username' => 'testo', 'password' => null, 'email' => 'a@a.com', 'password_confirmation' => '123456789']);
        $this->MissedResponse(['username' => 'testo', 'password' => '123456789', 'email' => null, 'password_confirmation' => '123456789']);
        $this->MissedResponse(['username' => 'tes', 'password' => '123456789', 'email' => 'a@a.com', 'password_confirmation' => '123456789']);
        $this->MissedResponse(['username' => 'testo', 'password' => '123456789', 'email' => 'a@a.com', 'password_confirmation' => '23456789']);
    }

    /**
     * Test for a successful signup
     */
    public function testValidSignUp()
    {
        $payload = ['username' => 'testo', 'password' => '123456789', 'email' => 'testo@test.com', 'password_confirmation' => '123456789'];
        $this->json('POST', 'api/unauth/signUp', $payload)
            ->assertStatus(200)
            ->assertJson([
                'success' => 'true'
            ])
            ->assertJsonStructure([
                'token'
            ]);
        User::deleteUserByUsername('testo');
    }

    /**
     * Utilitiy function to test invalid signup
     * $payload => Parameters of the request
     */
    public function MissedResponse($payload)
    {
        $this->json('POST', 'api/unauth/signUp', $payload)
            ->assertStatus(422)
            ->assertJson([
                'success' => 'false',
                'error' => 'Invalid or some data missed'
            ]);
    }
}
