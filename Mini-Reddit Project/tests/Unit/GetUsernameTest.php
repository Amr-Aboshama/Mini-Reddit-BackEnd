<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\DB;

class GetUsernameTest extends TestCase
{

    //this function is to test getting the username of an authorized user
    public function testGetUsernameOfAuthorizedUser()
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

        $this->json('GET', 'api/v1/auth/getUsername', [], $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true',
              'username' => $user->username
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

    //this function is to test getting the username of an unauthorized user
    public function testGetUsernameOfUnauthorizedUser()
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

        $this->json('GET', 'api/v1/auth/getUsername', [], $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }
}
