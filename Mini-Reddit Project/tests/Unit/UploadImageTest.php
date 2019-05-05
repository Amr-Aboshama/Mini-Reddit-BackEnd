<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\User;
use Illuminate\Support\Facades\DB;

class UploadImageTest extends TestCase
{
    //this function is to test uploading image by an unauthorized user
    public function testUploadImageByUnAuthorizedUser()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload = ['uploaded_image' => UploadedFile::fake()->image('test_image.jpg')];

        $this->json('POST', 'api/v1/auth/uploadImage', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);

          $user->delete();
          $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

    //this function is to test uploading image successfullay using an authorized user
    public function testUploadImageByAuthorizedUser()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['uploaded_image' => UploadedFile::fake()->image('test_image.jpg')];

        $this->json('POST', 'api/v1/auth/uploadImage', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true',
          ])->assertJsonStructure([
                'path'
            ]);

          $user->delete();
          $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

    //this function is to test uploading image which its size exceeds the maximum allowed size
    public function testUploadImageByAuthorizedUserExceedsMaxSize()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['uploaded_image' => UploadedFile::fake()->image('test_image.jpg')->size(2001)];

        $this->json('POST', 'api/v1/auth/uploadImage', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'Unsupported media type'
          ]);

          $user->delete();
          $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

    //this function is to test uploading a sound track instead of an image
    public function testUploadNonImageFileByAuthorizedUser()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['uploaded_image' => UploadedFile::fake()->image('test_image.mp3')];

        $this->json('POST', 'api/v1/auth/uploadImage', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'Unsupported media type'
          ]);

          $user->delete();
          $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

    //this function is to test uploading the an image without sending it in the request
    public function testUploadImageByAuthorizedUserWithNoFile()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('POST', 'api/v1/auth/uploadImage', [], $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'Unsupported media type'
          ]);

          $user->delete();
          $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

}
