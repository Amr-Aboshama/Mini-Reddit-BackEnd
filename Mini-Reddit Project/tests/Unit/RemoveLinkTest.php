<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Link;
use App\Http\Controllers\AuthenticationController;
use App\User;
use App\ModerateCommunity;
use Illuminate\Support\Facades\DB;

class RemoveLinkTest extends TestCase
{
    //this function is to test removing link using an unauthorized user
    public function testRemoveLinkWithUnauthorizedUser()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
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
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is for removing link using an request without a link_id
    public function testRemoveLinkWithoutLinkID()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
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
        $this->json('POST', 'api/auth/removeLink', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'link_id is required'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is for removing a non-existing link
    public function testRemoveNonExistingLink()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
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
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'The link doesn\'t exist'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
    }

    //this function is for removing link using a user who is not the author of the link
    public function testRemoveLinkUsingNonAuthorUser()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro'
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only the moderator of the community or the author of the link can remove it.'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $user->delete();
        Link::removeLink($link->id);
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }

    //this function is for removing link which doesn't belong to a community by its author
    public function testRemoveLinkOutCommunity()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
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
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
    }

    //this function is to remove an existing post by the moderator of the community where the posr is published
    public function testRemoveLinkInCommunityByModerator()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro',
            'community_id' => 1
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $moderate_community_cnt=DB::table('moderate_communities')->count();
        ModerateCommunity::store(1, $user->username);
        $this->assertEquals(DB::table('moderate_communities')->count(),$moderate_community_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $user->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('moderate_communities')->count(),$moderate_community_cnt);
    }

    //this function to remove a link in a community by the author
    public function testRemoveLinkInCommunityByAuthor()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $user2 = User::storeUser([
            'username' => 'Lomi',
            'email' => 'lomi@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'Lily',
            'community_id' => 1
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+2);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $moderate_community_cnt=DB::table('moderate_communities')->count();
        ModerateCommunity::store(1, 'Lomi');
        $this->assertEquals(DB::table('moderate_communities')->count(),$moderate_community_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
        $user->delete();
        $user2->delete();
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('moderate_communities')->count(),$moderate_community_cnt);
    }

    //this function is to remove an existing link in community using a user who isn't the author or a moderator
    public function testRemovLinkInCommunityByNonAuthourNorModerator()
    {
        $users_cnt=DB::table('users')->count();
        $links_cnt=DB::table('links')->count();
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link = Link::storeLink([
            'content' => 'test content',
            'title' => 'test title',
            'author_username' => 'amro',
            'community_id' => 1
        ]);
        $this->assertEquals(DB::table('users')->count(),$users_cnt+1);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('POST', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only the moderator of the community or the author of the link can remove it.'
          ]);
        $this->assertEquals(DB::table('links')->count(),$links_cnt+1);
        $user->delete();
        Link::removeLink($link->id);
        $this->assertEquals(DB::table('users')->count(),$users_cnt);
        $this->assertEquals(DB::table('links')->count(),$links_cnt);
    }
}
