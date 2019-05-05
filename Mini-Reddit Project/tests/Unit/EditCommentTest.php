<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AuthenticationController;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Link;

class EditCommentTest extends TestCase
{
    //this function is to test editing a comment by an unauthorized user
    public function testEditCommentByUnauthorizedUser()
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
        auth()->logout($user);

        $payload = ['comment_id' => $comment->id, 'new_content' => 'edit comment'];
        $this->json('PATCH', 'api/v1/auth/editComment', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a comment without a new content
    public function testEditCommentByauthorizedUserWithoutContent()
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

        $payload = ['comment_id' => $comment->id];
        $this->json('PATCH', 'api/v1/auth/editComment', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'There are some missing or invalid data!'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a comment by an unauthorized user who isn't the owner of the comment
    public function testEditCommentByauthorizedUnownerUser()
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
        $comment = Link::storeLink([
            'content' => 'test comment content',
            'parent_id' => $link->id,
            'author_username' => $owner->username
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 2);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 2);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['comment_id' => $comment->id, 'new_content' => 'edit comment'];
        $this->json('PATCH', 'api/v1/auth/editComment', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only the author of the comment/reply can edit it'
          ]);
        $user->delete();
        $owner->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to try editing a post
    public function testEditPostByauthorizedownerUser()
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

        $payload = ['comment_id' => $link->id, 'new_content' => 'edit comment'];
        $this->json('PATCH', 'api/v1/auth/editComment', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'comment/reply doesn\'t exist'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a comment by te author successfully
    public function testEditCommentByauthorizedUserSuccessfully()
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

        $payload = ['comment_id' => $comment->id, 'new_content' => 'edit'];
        $this->json('PATCH', 'api/v1/auth/editComment', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
            ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test editing a non-existing comment by te author
    public function testEditNonExistingCommentByauthorizedUser()
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

        Link::removeLink($comment->id);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['comment_id' => $comment->id, 'new_content' => 'edit'];
        $this->json('PATCH', 'api/v1/auth/editComment', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'comment/reply doesn\'t exist'
            ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }
}
