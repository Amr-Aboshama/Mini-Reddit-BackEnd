<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\HiddenPost;
use App\Link;

class UnhidePostTest extends TestCase
{
    //this function is to test unhidding a post using an unauthorized user
    public function testUnhidePostByUnauthorizedUser()
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
        $this->json('DELETE', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
        Link::removeLink($post->id);
    }

    //this function is to test unhidding a post without post_id
    public function testUnhidePostWithoutPostID()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        $this->json('DELETE', 'api/auth/unhidePost', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'post_id is required'
          ]);
        $user->delete();
    }

    //this function is to test hide a comment or reply
    public function testUnhideComment()
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
        HiddenPost::hidePost($comment->id,$user->username);
        $this->json('DELETE', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only posts can be unhidden!'
          ]);
        $user->delete();
        Link::removeLink($post->id);
    }

    //this function to test unhide post which is not hidden
    public function testUnhideUnhiddenPost()
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
        $this->json('DELETE', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only hidden posts can be unhidden!'
          ]);
        $user->delete();
        Link::removeLink($post->id);
    }

    //this function is to test unhidding post
    public function testUnhidePost()
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
        HiddenPost::hidePost($post->id, $user->username);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('DELETE', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $user->delete();
        Link::removeLink($post->id);
    }
}
