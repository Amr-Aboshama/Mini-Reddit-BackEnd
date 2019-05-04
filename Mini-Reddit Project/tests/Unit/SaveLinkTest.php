<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\Link;
use App\SavedLink;

class SaveLinkTest extends TestCase
{
    public function testDataMissed()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $token = auth()->login($user);
        $headers = [$token];
        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $payload = [];
        $this->json('POST', 'api/auth/saveLink', $payload, $headers)
            ->assertStatus(422)
            ->assertJson([
                "success" => "false",
                "error" => "Invalid or some data missed"
            ]);

        auth()->logout();
        $user->delete();

    }
    public function testSuccess()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $token = auth()->login($user);
        $headers = [$token];
        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $payload = ['link_id'=>$link->id];
        $this->json('POST', 'api/auth/saveLink', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "success" => "true"
            ]);

        auth()->logout();
        $user->delete();

    }
    public function testUnAuthorizationOfUser()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $payload = ['link_id'=>$link->id];
        $this->json('POST', 'api/auth/saveLink', $payload, [])
            ->assertStatus(401)
            ->assertJson([
                "success" => "false",
                "error" => "UnAuthorized"
            ]);

        $user->delete();

    }

    public function testAlreadySaved()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $token = auth()->login($user);
        $headers = [$token];
        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $link_saved = SavedLink::store( $user->username, $link->id);
        $payload = ['link_id'=>$link->id];
        $this->json('POST', 'api/auth/saveLink', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "already saved"
            ]);

        auth()->logout();
        $user->delete();

    }

    public function testLinkNonExistance()
    {
        $user = User::storeUser(['username' => 'test99', 'password' => 'armne123456', 'email' => 'test99@test.com']);

        $token = auth()->login($user);
        $headers = [$token];
        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $payload = ['link_id'=>($link->id+1)];
        $this->json('POST', 'api/auth/saveLink', $payload, $headers)
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => 'this post, comment or reply doesn\'t exist'
            ]);

        auth()->logout();
        $user->delete();

    }

}
