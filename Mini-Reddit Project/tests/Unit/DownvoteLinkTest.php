<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DownvotedLink;
use App\UpvotedLink;
use App\Link;
use App\Http\Controllers\AuthenticationController;
use App\User;
use Illuminate\Support\Facades\DB;

class DownvoteLinkTest extends TestCase
{
    //this function is to test downvoting an existing post/comment or reply which is upvoted
    public function testDownvoteUpvotedPost()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $downvoted_cnt=DB::table('downvoted_links')->count();
        $upvoted_cnt=DB::table('upvoted_links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        UpvotedLink::store($user->username, $link->id);
        $this->assertEquals(DB::table('upvoted_links')->count(),$upvoted_cnt+1);
        Link::incrementUpvotes($link->id);
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/downvoteLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('upvoted_links')->count(),$upvoted_cnt);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt+1);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt);
    }

    //this function is to test downvoting an existing post/comment or reply which isn't upvoted
    public function testDownvoteNonUpvotedLink()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $downvoted_cnt=DB::table('downvoted_links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/downvoteLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt+1);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt);
    }


    //this function is to test downvoting an non-existing post/comment or reply
    public function testDownvotNonExistingLink()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $downvoted_cnt=DB::table('downvoted_links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        Link::removeLink($link->id);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/downvoteLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'The Link doesn\'t exist'
          ]);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function to test downvoting a post/comment or reply using an unauthorized user
    public function testDownvoteLinkWithUnuthorizedUser()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $downvoted_cnt=DB::table('downvoted_links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/downvoteLink', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is to test undownvoting an existing post/comment or reply which is downvoted
    public function testUndownvoteDownvotedLink()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $downvoted_cnt=DB::table('downvoted_links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => $user->username
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        DownvotedLink::store($user->username, $link->id);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt+1);
        Link::incrementDownvotes($link->id);
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/downvoteLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is to test downvoting an post/comment or reply using a request has no "link_id"
    public function testDownvotLinkWithoutLinkID()
    {
        $users_cnt=DB::table('users')->count();
        $downvoted_cnt=DB::table('downvoted_links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];

        $this->json('POST', 'api/auth/downvoteLink', [], $headers)
           ->assertStatus(403)
           ->assertJson([
               'success' => 'false',
               'error' => 'link_id is required'
           ]);
        $this->assertEquals(DB::table('downvoted_links')->count(),$downvoted_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
    }
}
