<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class DeleteMyAccountTest extends TestCase
{
    
    /**
     * Test for an unauthorized action to delete the account
     */
    public function testUnauthorizedDeletion() {


        $user = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($user);
        $headers = [$token];


        // $this->json('POST', 'api/v1/auth/deleteMyAccount', ['password'=>'123456789'], [])
        //     ->assertStatus(401)
        //     ->assertJson([
        //         "success" => "false",
        //         "error" => "UnAuthorized"
        //     ]);

        
        auth()->logout();

        $this->json('POST', 'api/v1/auth/deleteMyAccount', ['password'=>'123456789'], $headers)
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);

        $user->delete();
    }

    /**
     * Test for incorrect password for deletion
     */
    public function testIncorrectPassword() {


        $user = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($user);
        $headers = [$token];


        $this->json('POST', 'api/v1/auth/deleteMyAccount', ['password'=>'1234567899'], $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "password isn't correct"
            ]);

        $user->delete();
    }

    /**
     * Test for valid account deletion
     */
    public function testValidDeletion() {


        $user = User::storeUser([
            'username' => 'testo',
            'email' => 'testo@test.com',
            'password' => '123456789'
        ]);

        $token = auth()->login($user);
        $headers = [$token];


        $this->json('POST', 'api/v1/auth/deleteMyAccount', ['password'=>'123456789'], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        $user->delete();
    }
}
