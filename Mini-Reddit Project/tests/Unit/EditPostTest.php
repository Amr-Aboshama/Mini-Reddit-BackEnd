<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AuthenticationController;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Link;

class EditPostTest extends TestCase
{
    //this function is to test editing a post by an unauthorized user
    public function testEditPostByUnauthorizedUser()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload = ['post_id' => $link->id, 'new_content' => 'edit post'];
        $this->json('PATCH', 'api/v1/auth/editPost', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a post without any data!
    public function testEditPostWithoutData()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('PATCH', 'api/v1/auth/editPost', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'There are some missing or invalid data!'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a non existing post
    public function testEditNonExistingPost()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        Link::removeLink($link->id);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_id' => $link->id, 'new_content' => 'edit post'];
        $this->json('PATCH', 'api/v1/auth/editPost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'post doesn\'t exist'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a comment
    public function testEditComment()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $comment = Link::storeLink([
            'content' => 'test comment content',
            'parent_id' => $link->id,
            'author_username' => $user->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 2);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_id' => $comment->id, 'new_content' => 'edit post'];
        $this->json('PATCH', 'api/v1/auth/editPost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
                'error' => 'There are some missing or invalid data!'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a post with a non author user
    public function testEditPostWithNonOwnerUser()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $owner = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $user = User::storeUser([
            'username' => 'lomi',
            'email' => 'lomi@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $owner->username
        ]);
        $this->assertEquals(DB::table('users')->count(), $users_cnt + 2);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_id' => $link->id, 'new_content' => 'edit post'];
        $this->json('PATCH', 'api/v1/auth/editPost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'Only the author of the post can edit it'
          ]);
        $user->delete();
        $owner->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a post without any changes!
    public function testEditPostWithoutChanges()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_id' => $link->id, 'new_content' => 'test link content'];
        $this->json('PATCH', 'api/v1/auth/editPost', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'There are something went wrong!'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a post successfully
    public function testEditPostsuccessfully()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test link content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_id' => $link->id, 'new_content' => 'edit post', 'new_title' => 'edit title',
            'new_image' => 'storage/post_images/test.jpg', 'new_video_url' => 'https://www.youtube.com/'];
        $this->json('PATCH', 'api/v1/auth/editPost', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
            'success' => 'true'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }
}
