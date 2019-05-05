<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\Assert;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\User;

class UpdateProfileImageTest extends TestCase
{

    /**
     * Test unauthoried update of user profile/cover photo
     * $headers => Holds the token to authenticate $user
     */
    public function testUnauthorizedUpdateOfProfileImage()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout();


        $this->json('POST', 'api/v1/auth/updateCoverAndProfileImage', ['profile_image' => UploadedFile::fake()->image('avatar.jpg'), 'profile_or_cover' => 1], $headers)
            ->assertStatus(401)
            ->assertJson([
                'success' => 'false',
                'error' => 'UnAuthorized'
            ]);

        $user->delete();
    }

    /**
     * Test unsupported media type to update user profile/cover photo
     * $headers => Holds the token to authenticate $user
     */
    public function testUnsupportedMediaToUpdateProfileImage()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];


        $this->json(
            'POST',
            'api/v1/auth/updateCoverAndProfileImage',
            ['profile_image' => UploadedFile::fake()->image('avatar.jpp'),
                'profile_or_cover' => 1],
            $headers
        )
            ->assertStatus(403)
            ->assertJson([
                'success' => 'false',
                'error' => 'Unsupported media type'
            ]);

        $user->delete();
    }

    /**
     * Test uncategorized profile/cover photo
     * $headers => Holds the token to authenticate $user
     */
    public function testUncategorizedImageToUpdateProfileImage()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];


        $this->json(
            'POST',
            'api/v1/auth/updateCoverAndProfileImage',
            ['profile_image' => UploadedFile::fake()->image('avatar.jpg'),
                'profile_or_cover' => 3],
            $headers
        )
            ->assertStatus(403)
            ->assertJson([
                'success' => 'false',
                'error' => 'photo is not categorized neither profile nor cover photo'
            ]);

        $user->delete();
    }

    /**
     * Test for a valid update of user Profile Image
     * $headers => Holds the token to authenticate $user
     */
    public function testValidUpdateOfUserProfileImage()
    {
        $user = User::storeUser([
            'username' => 'testo1',
            'email' => 'testo1@test.com',
            'password' => 'armne123456',
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json(
            'POST',
            'api/v1/auth/updateCoverAndProfileImage',
            ['profile_image' => UploadedFile::fake()->image('avatar.jpg'),
                'profile_or_cover' => 1],
            $headers
        )
            ->assertStatus(200);


        // $userprofileimage = User::getUserWholeRecord($user->username)->photo_url;
        // Assert::assertEquals('avatar.jpg', $userprofileimage);

        $this->json(
            'POST',
            'api/v1/auth/updateCoverAndProfileImage',
            ['profile_image' => UploadedFile::fake()->image('avatar.jpg'),
                'profile_or_cover' => 2],
            $headers
        )
            ->assertStatus(200);


        // $usercoverimage = User::getUserWholeRecord($user->username)->cover_url;
        // Assert::assertEquals('avatar.jpg', $usercoverimage);


        $user->delete();
    }
}
