<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\HiddenPost;
use App\Link;

class HidePostTest extends TestCase
{
    //this function is to test hidding a post using an unauthorized user
    public function testHidePostByUnauthorizedUser()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);

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
        Link::removeLink($post->id);
    }

    //this function to test hide post which is already hidden
    public function testHideHiddenPost()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        HiddenPost::hidePost($post->id,$user->username);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/hidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'already hidden'
          ]);
        $user->delete();
        Link::removeLink($post->id);
    }

    //this function is to test hide a comment or reply
    public function testHideComment()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

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
    }

    //this function is to test hidding a post without post_id
    public function testHidePostWithoutPostID()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        $this->json('POST', 'api/auth/hidePost', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'post_id is required'
          ]);
        $user->delete();
    }

    //this function is to test hidding post
    public function testHidePost()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
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
    }

    //this function to test hidding a non-existing post
    public function testHideNonExistingPost()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        Link::removeLink($post->id);
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
        Link::removeLink($post->id);
    }

}
