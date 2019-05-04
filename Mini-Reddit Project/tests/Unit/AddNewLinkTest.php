<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\AuthenticationController;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Link;
use App\ModerateCommunity;

class AddNewLinkTest extends TestCase
{
    //this function is to test adding a link by an unauthorized user
    public function testAddLinkByUnauthorizedUser()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload = ['post_content' => 'test add link', 'post_title' => 'post title'];
        $this->json('POST', 'api/auth/addLink', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test adding a link without any data!
    public function testAddLinkWithoutData()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $this->json('POST', 'api/auth/addLink', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'There are some missing or invalid data!'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test adding a link in a community by a non-moderator nor subscriber user
    public function testAddLinkInCommunityWithNonModeratorNorSubscriberUser()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_content' => 'test add link', 'post_title' => 'post title', 'community_id' => 1];
        $this->json('POST', 'api/auth/addLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only moderators or subscribers can post in the community'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test adding a post by a user
    public function testAddPostByUser()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_content' => 'test add link', 'post_title' => 'post title'];
        $this->json('POST', 'api/auth/addLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ])->assertJsonStructure([
            'link_id'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test adding a comment by a user
    public function testAddCommentByUser()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
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

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_content' => 'test add link', 'post_title' => 'post title','parent_link_id' => $link->id];
        $this->json('POST', 'api/auth/addLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ])->assertJsonStructure([
            'link_id'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 2);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test adding a post by a moderator in a community
    public function testAddPostByModeratorInCommunity()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $moderate_community_cnt = DB::table('moderate_communities')->count();
        ModerateCommunity::store(1, $user->username);
        $this->assertEquals(DB::table('moderate_communities')->count(), $moderate_community_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_content' => 'test add link', 'post_title' => 'post title', 'community_id' => 1];
        $this->json('POST', 'api/auth/addLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ])->assertJsonStructure([
            'link_id'
        ]);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);
        $user->delete();
        $this->assertEquals(DB::table('moderate_communities')->count(), $moderate_community_cnt);
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

    //this function is to test adding a comment in a community that its post don't belong to
    public function testAddCommentInCommunityNotIncldeItsPost()
    {
        $users_cnt = DB::table('users')->count();
        $links_cnt = DB::table('links')->count();
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

        $this->assertEquals(DB::table('users')->count(), $users_cnt + 1);
        $this->assertEquals(DB::table('links')->count(), $links_cnt + 1);

        $token = auth()->login($user);
        $headers = [$token];

        $payload = ['post_content' => 'test add link', 'parent_link_id' => $link->id, 'community_id' => 1];
        $this->json('POST', 'api/auth/addLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'The post you are replying on isn\'t in the sent community!'
          ]);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(), $users_cnt);
        $this->assertEquals(DB::table('links')->count(), $links_cnt);
    }

}
