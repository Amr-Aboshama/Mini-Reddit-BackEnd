<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Assert;
use Illuminate\Support\Facades\Hash;
use App\User;

class ChangePasswordTest extends TestCase
{
    /**
     * Test unauthoried update of user displayname
     * $headers => Holds the token to authenticate $user
     */
    public function testUnauthorizedChangeOfPassword()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout();


        $this->json('PATCH', 'api/auth/changePassword', ['password' => 'armne123456',
            'new_password' => 'newarmne123456', 'confirm_new_password' => 'newarmne123456'], $headers)
            ->assertStatus(401)
            ->assertJson([
                'success' => 'false',
                'error' => 'UnAuthorized'
            ]);

        $user->delete();
    }

    /**
     * Test for a valid change of password
     * $headers => Holds the token to authenticate $user
     */
    public function testValidChangeOfPassword()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);



        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/changePassword', ['password' => 'armne123456',
            'new_password' => 'newarmne123456', 'confirm_new_password' => 'newarmne123456'], $headers)
            ->assertStatus(200)
            ->assertJson([
                'success' => 'true'
            ]);

        $hashedpassword = User::getHashedPassword($user->username);
        Assert::assertEquals(1, Hash::check('newarmne123456', $hashedpassword));


        $user->delete();
    }

    /**
     * Test for invalid change of password due to wrong old password
     * $headers => Holds the token to authenticate $user
     */
    public function testiWrongOldPasswordToChangePassword()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);



        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/changePassword', ['password' => 'armne12345',
            'new_password' => 'newarmne123456', 'confirm_new_password' => 'newarmne123456'], $headers)
            ->assertStatus(404)
            ->assertJson([
                'success' => 'false',
                'error' => 'wrong old passwords'
            ]);

        $user->delete();
    }

    /**
     * Test for invalid change of password due to unmatched new password
     * $headers => Holds the token to authenticate $user
     */
    public function testUnmatchedConfirmationToChangePassword()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);



        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/changePassword', ['password' => 'armne123456',
            'new_password' => 'newarmne123456', 'confirm_new_password' => 'nnewarmne123456'], $headers)
            ->assertStatus(404)
            ->assertJson([
                'success' => 'false',
                'error' => "new password doesn't match the confirmation"
            ]);

        $user->delete();
    }
}
