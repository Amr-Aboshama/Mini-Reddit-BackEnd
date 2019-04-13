<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Assert;
use App\User;

class UpdateDisplayNameTest extends TestCase
{
    /**
     * Test for a valid update of user display name
     * $headers => Holds the token to authenticate $user
     */
    public function testValidUpdateOfUserDisplayName()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/updateDisplayName', ['name' => 'testlolo'], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);


        $userdisplayname = User::getUserWholeRecord($user->username)->display_name;
        Assert::assertEquals('testlolo', $userdisplayname);


        $user->delete();
    }

    /**
     * Test for a invalid update due to assertion of old value
     * $headers => Holds the token to authenticate $user
     */
    public function testUpdateDisplayNameWithOldValue()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/updateDisplayName', ['name' => 'testlolo'], $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        $userdisplayname = User::getUserWholeRecord($user->username)->display_name;
        Assert::assertEquals('testlolo', $userdisplayname);

        $this->json('PATCH', 'api/auth/updateDisplayName', ['name' => 'testlolo'], $headers)
            ->assertStatus(400)
            ->assertJson([
                'success' => 'false',
                'error' => 'you are trying to update with the old value'
            ]);

        $user->delete();
    }

    /**
     * Test unauthoried update of user displayname
     * $headers => Holds the token to authenticate $user
     */
    public function testUnauthorizedUpdateOfDisplayName()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout();


        $this->json('PATCH', 'api/auth/updateDisplayName', ['name' => 'testlolo'], $headers)
            ->assertStatus(401)
            ->assertJson([
                'success' => 'false',
                'error' => 'UnAuthorized'
            ]);

        $user->delete();
    }

    /**
     * Test invalid update of user display name due to non existance of name
     * $headers => Holds the token to authenticate $user
     */
    public function testUpdateDisplayNameWithNoName()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/auth/updateDisplayName', ['name' => ''], $headers)
            ->assertStatus(403)
            ->assertJson([
                'success' => 'false',
                'error' => 'user must have a name'
            ]);

        $this->json('PATCH', 'api/auth/updateDisplayName', [], $headers)
            ->assertStatus(403)
            ->assertJson([
                'success' => 'false',
                'error' => 'user must have a name'
            ]);

        $user->delete();
    }
}
