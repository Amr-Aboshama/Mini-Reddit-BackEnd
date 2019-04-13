<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Assert;
use App\User;

class UpdateAboutTest extends TestCase
{
    /**
     * Test for a valid update of user about
     * $headers => Holds the token to authenticate $user
     */
    public function testValidUpdateOfUserAbout()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/updateAbout', ['about' => 'testabout'], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        $userabout = User::getUserWholeRecord($user->username)->about;    
        Assert::assertEquals('testabout', $userabout);   


        $user->delete();
    }

    /**
     * Test for invalid update due to assertion of old value
     * $headers => Holds the token to authenticate $user
     */
    public function testUpdateAboutWithOldValue()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/updateAbout', ['about' => 'testabout'], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        $userabout = User::getUserWholeRecord($user->username)->about;    
        Assert::assertEquals('testabout', $userabout);  

        $this->json('PATCH', 'api/auth/updateAbout', ['about' => 'testabout'], $headers)
            ->assertStatus(400)
            ->assertJson([
                'success' => 'false',
                'error' => 'you are trying to update with the old value'
            ]);

        $user->delete();
    }

    /**
     * Test unauthoried update of About
     * $headers => Holds the token to authenticate $user
     */
    public function testUnauthorizedUpdateOfAbout()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout();
    

        $this->json('PATCH', 'api/auth/updateAbout', ['about' => 'testabout'], $headers)
            ->assertStatus(401)
            ->assertJson([
                'success' => 'false',
                'error' => 'UnAuthorized'
            ]);

        $user->delete();
    }

    /**
     * Test invalid update of user about due to non existance of about
     * $headers => Holds the token to authenticate $user
     */
    public function testUpdateAboutWithNoName()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/updateAbout', ['about' => ''], $headers)
            ->assertStatus(403)
            ->assertJson([
                'success' => 'false',
                'error' => 'no about is written'
            ]);

        $this->json('PATCH', 'api/auth/updateAbout', [], $headers)
            ->assertStatus(403)
            ->assertJson([
                'success' => 'false',
                'error' => 'no about is written'
            ]);    

        $user->delete();
    }
}
