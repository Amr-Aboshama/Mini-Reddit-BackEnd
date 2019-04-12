<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\HiddenPost;
use App\Link;
use Illuminate\Support\Facades\DB;

class HidePostTest extends TestCase
{
    //this function is to test hidding a post using an unauthorized user
    public function testHidePostByUnauthorizedUser()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789'
        ]);
        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $links_cnt = DB::table('links')->count();
        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);
        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/hidePost', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function to test hide post which is already hidden
    public function testHideHiddenPost()
    {
        $users_cnt = DB::table('users')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);
        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $links_cnt = DB::table('links')->count();
        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);
        $hidden_cnt = DB::table('hidden_posts')->count();
        HiddenPost::hidePost($post->id, $user->username);
        $this->assertEquals(DB::table('hidden_posts')->count(), $hidden_cnt + 1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/hidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'already hidden'
          ]);
        $this->assertEquals(DB::table('hidden_posts')->count(), $hidden_cnt + 1);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test hide a comment or reply
    public function testHideComment()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);
        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        $comment = Link::storeLink([
            'content' => 'test content comment',
            'title' => 'test comment title',
            'author_username' => $user->username,
            'parent_id' => $post->id
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 2);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $comment->id];
        $this->json('POST', 'api/auth/hidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only posts can be hidden'
          ]);
        $user->delete();
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test hidding a post without post_id
    public function testHidePostWithoutPostID()
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
        $this->json('POST', 'api/auth/hidePost', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'post_id is required'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }

    //this function is to test hidding post
    public function testHidePost()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);
        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/hidePost', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $user->delete();
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function to test hidding a non-existing post
    public function testHideNonExistingPost()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);
        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/hidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'The post doesn\'t exist'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
    }
}
