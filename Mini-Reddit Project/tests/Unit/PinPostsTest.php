<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use App\ModerateCommunity;
use App\Link;

class PinPostsTest extends TestCase
{
    //this function to test pinning a post using an unauthorized user
    public function testPinPostWithUnuthorizedUser()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload=['post_id'=> $post->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(401)
          ->assertJson([
              'success'=>'false',
              'error'=>'UnAuthorized'
          ]);
        $user->delete();
    }

    //this function is to test Pinning an non-existing post
    public function testPinNonExistingLink()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);

        $token = auth()->login($user);
        $headers = [$token];

        Link::removeLink($post->id);

        $payload=['post_id'=> $post->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(403)
          ->assertJson([
              'success'=>'false',
              'error'=>'The post doesn\'t exist'
          ]);
        $user->delete();
    }

     //this function is to test pinning an post using a request has no "post_id"
     public function testPinPostWithoutPostID()
     {
         $user = User::storeUser([
             'username' => 'Lily',
             'email' => 'lily@l.com',
             'password' => '123456789',
         ]);

         $token = auth()->login($user);
         $headers = [$token];

         $this->json('PATCH','api/auth/pinPost',[],$headers)
           ->assertStatus(403)
           ->assertJson([
               'success'=>'false',
               'error'=>'post_id is required'
           ]);
         $user->delete();
     }

     //this function is to test pinning an existing comment or reply
     public function testPinCommentOrReply()
     {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $comment=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username,
            'parent_id'=> 1
        ]);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id'=> $comment->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(403)
          ->assertJson([
              'success'=>'false',
              'error'=>'Only posts can be pinned'
          ]);
        $user->delete();
     }

     //this function is to pin an existing post
     public function testPinPost()
     {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id'=> $post->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(200)
          ->assertJson([
              'success'=>'true',
          ]);
        $user->delete();
     }

     //this function is to pin an existing post by a user who don't own the post
     public function testPinPostWithNonOwnerUser()
     {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>'amro'
        ]);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id'=> $post->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'The user can pin only his own posts!'
          ]);
        $user->delete();
        Link::removeLink($post->id);
     }

     //this function is to pin an existing post by the moderator of the community where the posr is published
     public function testPinPostInCommunityByModerator()
     {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>'amro',
            'community_id'=> 1
        ]);
        ModerateCommunity::store(1,$user->username);
        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id'=> $post->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(200)
          ->assertJson([
              'success'=>'true'
          ]);
        $user->delete();
        Link::removeLink($post->id);
     }

     //this function is to pin an existing post by non-moderator of the community where the posr is published
     public function testPinPostInCommunityByNonModerator()
     {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $post=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>'amro',
            'community_id'=> 1
        ]);

        $token = auth()->login($user);
        $headers = [$token];
        $payload = ['post_id'=> $post->id];
        $this->json('PATCH','api/auth/pinPost',$payload,$headers)
          ->assertStatus(403)
          ->assertJson([
            'success' => 'false',
            'error' => 'Only moderators can pin posts in the community!'
          ]);
        $user->delete();
        Link::removeLink($post->id);
     }
}
