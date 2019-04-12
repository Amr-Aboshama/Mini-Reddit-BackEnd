<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\HiddenPost;
use App\Link;
use Illuminate\Support\Facades\DB;

class UnhidePostTest extends TestCase
{
    //this function is to test unhidding a post using an unauthorized user
    public function testUnhidePostByUnauthorizedUser()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $hidden_cnt=DB::table('hidden_posts')->count();

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

        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt);
        $user->delete();
        Link::removeLink($post->id);

        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is to test unhidding a post without post_id
    public function testUnhidePostWithoutPostID()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $hidden_cnt=DB::table('hidden_posts')->count();

        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        $this->json('POST', 'api/auth/unhidePost', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'post_id is required'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
    }

    //this function is to test hide a comment or reply
    public function testUnhideComment()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $hidden_cnt=DB::table('hidden_posts')->count();

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

        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+2);

        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $comment->id];
        HiddenPost::hidePost($comment->id, $user->username);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt+1);

        $this->json('POST', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only posts can be unhidden!'
          ]);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt+1);

        $user->delete();
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt);
    }

    //this function to test unhide post which is not hidden
    public function testUnhideUnhiddenPost()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $hidden_cnt=DB::table('hidden_posts')->count();

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

        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);

        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only hidden posts can be unhidden!'
          ]);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt);
        $user->delete();
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is to test unhidding post
    public function testUnhidePost()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $hidden_cnt=DB::table('hidden_posts')->count();

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
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id' => $post->id];
        $this->json('POST', 'api/auth/unhidePost', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('hidden_posts')->count(),$hidden_cnt);
        $user->delete();
        Link::removeLink($post->id);
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }
}
