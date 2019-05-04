<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\PasswordReset;
use App\User;

class ResetPasswordTest extends TestCase
{
    /**
     * Test Wrong link to reset password.
     */
    public function testWrongLink()
    {
        $this->json('POST', 'api/unauth/resetPassword/123', [
          'password' => '123456789',
          'password_confirmation' => '123456789', ],
           [])
              ->assertStatus(404)
              ->assertJson([
                  'success' => 'false',
                  'error' => 'Link is wrong or expired',
              ]);
    }

    /**
     * Test Mismatched passwords.
     */
    public function testPasswordMisMatch()
    {
        $this->json('POST', 'api/unauth/resetPassword/123', [
          'password' => '123456789',
          'password_confirmation' => '1234', ],
            [])
              ->assertStatus(403)
              ->assertJson([
                  'success' => 'false',
                  'error' => 'Passwords don\'t match',
              ]);

        $this->json('POST', 'api/unauth/resetPassword/123', [
          'password' => '123',
          'password_confirmation' => '123', ],
            [])
              ->assertStatus(403)
              ->assertJson([
                  'success' => 'false',
                  'error' => 'Passwords don\'t match',
              ]);
    }

    /**
     * test a valid resetting password.
     */
    public function testValidResetPassword()
    {
        $user = User::storeUser([
          'username' => 'testRP1',
          'password' => '123456789',
          'email' => 'testRP1@testRP1.com',
        ]);

        $hash = PasswordReset::createPasswordReset($user->email);
        $new_password = '987654321';
        $this->json('POST', 'api/unauth/resetPassword/'.$hash, [
          'password' => $new_password,
          'password_confirmation' => $new_password, ],
            [])
              ->assertStatus(200)
              ->assertJson([
                  'success' => 'true',
              ]);
        $this->assertEquals(1, User::checkIfPasswordRight($user->username, $new_password));
        $user->delete();
    }
}
