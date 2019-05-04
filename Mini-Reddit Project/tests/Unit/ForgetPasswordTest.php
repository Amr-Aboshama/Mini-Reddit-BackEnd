<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;

class ForgetPasswordTest extends TestCase
{
    /**
     * Testing email doesn't exist.
     */
    public function testEmailNonExistance()
    {
        $this->json('POST', 'api/unauth/forgetPassword', [], [])
              ->assertStatus(404)
              ->assertJson([
                  'success' => 'false',
                  'error' => 'email doesn\'t exist',
                ]);

        $this->json('POST', 'api/unauth/forgetPassword', [], [])
              ->assertStatus(404)
              ->assertJson([
                  'success' => 'false',
                  'error' => 'email doesn\'t exist',
                ]);
    }

    /**
     * Test valid Email to get forget password.
     */
    public function testValidEmail()
    {
        $user = User::storeUser([
          'username' => 'testFP1',
          'password' => '123456789',
          'email' => 'testFP1@testFP1.com',
        ]);

        $this->json('POST', 'api/unauth/forgetPassword', ['email' => $user->email], [])
              ->assertStatus(200)
              ->assertJson([
                  'success' => 'true',
              ]);

        $this->assertDatabaseHas('password_resets', [
            'email' => $user->email,
        ]);
        $user->delete();
    }
}
