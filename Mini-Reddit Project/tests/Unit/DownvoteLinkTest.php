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

class DownvoteLinkTest extends TestCase
{
    //this function is to test downvoting an existing post/comment or reply which is upvoted
    public function testDownvoteUpvotedPost()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);
        $token = auth()->login($user);
        $headers = [$token];
        UpvotedLink::store($user->username,$link->id);
        Link::incrementUpvotes($link->id);
        $payload=['link_id'=> $link->id];
        $this->json('POST','api/auth/downvoteLink',$payload,$headers)
          ->assertStatus(200)
          ->assertJson([
              'success'=>'true'
          ]);
        $user->delete();
    }

    //this function is to test downvoting an existing post/comment or reply which isn't upvoted
    public function testDownvoteNonUpvotedLink()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);
        $token = auth()->login($user);
        $headers = [$token];

        $payload=['link_id'=>$link->id];
        $this->json('POST','api/auth/downvoteLink',$payload,$headers)
          ->assertStatus(200)
          ->assertJson([
              'success'=>'true'
          ]);
        $user->delete();
    }


    //this function is to test downvoting an non-existing post/comment or reply 
    public function testDownvotNonExistingLink()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);
        $token = auth()->login($user);
        $headers = [$token];
        Link::removeLink($link->id);

        $payload=['link_id'=> $link->id];
        $this->json('POST','api/auth/downvoteLink',$payload,$headers)
          ->assertStatus(403)
          ->assertJson([
              'success'=>'false',
              'error'=>'The Link doesn\'t exist'
          ]);
        $user->delete();
    }

    //this function to test downvoting a post/comment or reply using an unauthorized user
    public function testDownvoteLinkWithUnuthorizedUser()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);
        $token = auth()->login($user);
        $headers = [$token];
        auth()->logout($user);

        $payload=['link_id'=> $link->id];
        $this->json('POST','api/auth/downvoteLink',$payload,$headers)
          ->assertStatus(401)
          ->assertJson([
              'success'=>'false',
              'error'=>'UnAuthorized'
          ]);
        $user->delete();
    }

    //this function is to test undownvoting an existing post/comment or reply which is downvoted
    public function testUndownvoteDownvotedLink()
    {
        $user = User::storeUser([
            'username' => 'Lily',
            'email' => 'lily@l.com',
            'password' => '123456789',
        ]);

        $link=Link::storeLink([
            'content'=>'test content',
            'title'=> 'test title',
            'author_username'=>$user->username
        ]);
        $token = auth()->login($user);
        $headers = [$token];

        DownvotedLink::store($user->username,$link->id);
        Link::incrementDownvotes($link->id);
        $payload=['link_id'=> $link->id];
        $this->json('POST','api/auth/downvoteLink',$payload,$headers)
          ->assertStatus(200)
          ->assertJson([
              'success'=>'true'
          ]);
        $user->delete();
    }

     //this function is to test downvoting an post/comment or reply using a request has no "link_id"
     public function testDownvotLinkWithoutLinkID()
     {
         $user = User::storeUser([
             'username' => 'Lily',
             'email' => 'lily@l.com',
             'password' => '123456789',
         ]);
 
         $token = auth()->login($user);
         $headers = [$token];
 
         $this->json('POST','api/auth/downvoteLink',[],$headers)
           ->assertStatus(403)
           ->assertJson([
               'success'=>'false',
               'error'=>'link_id is required'
           ]);
         $user->delete();
     }
}
