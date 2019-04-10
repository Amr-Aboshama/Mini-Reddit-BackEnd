<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Link;
use App\Http\Controllers\AuthenticationController;
use App\User;
use App\ModerateCommunity;

class RemoveLinkTest extends TestCase
{
    //this function is to test removing link using an unauthorized user
    public function testRemoveLinkWithUnauthorizedUser()
    {
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
        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(401)
          ->assertJson([
              'success' => 'false',
              'error' => 'UnAuthorized'
          ]);
        $user->delete();
    }

    //this function is for removing link using an request without a link_id
    public function testRemoveLinkWithoutLinkID()
    {
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
        $token = auth()->login($user);
        $headers = [$token];
        $this->json('DELETE', 'api/auth/removeLink', [], $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'link_id is required'
          ]);
        $user->delete();
    }

    //this function is for removing a non-existing link
    public function testRemoveNonExistingLink()
    {
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
        $token = auth()->login($user);
        $headers = [$token];
        Link::removeLink($link->id);
        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'The link doesn\'t exist'
          ]);
        $user->delete();
    }

    //this function is for removing link using a user who is not the author of the link
    public function testRemoveLinkUsingNonAuthorUser()
    {
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
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only the moderator of the community or the author of the link can remove it.'
          ]);
        $user->delete();
        Link::removeLink($link->id);
    }

    //this function is for removing link which doesn't belong to a community by its author
    public function testRemoveLinkOutCommunity()
    {
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
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $user->delete();
    }

    //this function is to remove an existing post by the moderator of the community where the posr is published
    public function testRemoveLinkInCommunityByModerator()
    {
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
        ModerateCommunity::store(1, $user->username);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $user->delete();
        Link::removeLink($link->id);
    }

    //this function to remove a link in a community by the author
    public function testRemoveLinkInCommunityByAuthor()
    {
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
        ModerateCommunity::store(1, 'Lomi');
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(200)
          ->assertJson([
              'success' => 'true'
          ]);
        $user->delete();
        $user2->delete();
    }

    //this function is to remove an existing link in community using a user who isn't the author or a moderator
    public function testRemovLinkInCommunityByNonAuthourNorModerator()
    {
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
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['link_id' => $link->id];
        $this->json('DELETE', 'api/auth/removeLink', $payload, $headers)
          ->assertStatus(403)
          ->assertJson([
              'success' => 'false',
              'error' => 'Only the moderator of the community or the author of the link can remove it.'
          ]);
        $user->delete();
        Link::removeLink($link->id);
    }
}
