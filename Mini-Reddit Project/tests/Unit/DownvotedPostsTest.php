<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\DownvotedLink;
use App\Link;

class DownvotedPostsTest extends TestCase
{
     public function checkPosts($posts)
     {
          foreach ($posts as $post) {
          $parent = Link::getParent($post['post_id']);
          if ($parent != null) {
                return 0;
             }
          }

          return 1;
     }


     public function checkDownvoted($posts , $username)
     {
          foreach($posts as $post) {
               if(! DownvotedLink:: downvoted($post['post_id'] , $username)) {
                    return 0;
               }

          }

          return 1 ;
     }

     public function testUnauthorizedUsers()
     {
          $this->json('GET' , 'api/auth/viewUpOrDownvotedPosts' , ['type'=>'0'])->assertStatus(401)->assertJson([
            "success" => "false",
            "error" => "UnAuthorized"
          ]);
     }

     public function testAuthorizedUsers()
     {
          //logging in a user "ahmed"...

          $signIn = $this->json('POST' , 'api/unauth/signIn' , ['username' => 'amro' , 'password' => '123456789']);
          $token = $signIn->json('token');
          $headers = ["Authorization" => "Bearer $token"];

          //type of posts is missed...

          $response = $this->json('GET' , 'api/auth/viewUpOrDownvotedPosts' , [] , $headers)->assertStatus(403)->assertJson([
            'success' => 'false',
            'error' => 'type is required'
          ]);

          //sending undefined type....

          $response = $this->json('GET' , 'api/auth/viewUpOrDownvotedPosts' , ['type' => 5] , $headers)->assertStatus(403)->assertJson([
            'success' => 'false',
            'error' => 'type is undefined it must be one for upvoted posts and 0 for downvoted ones'
          ]);

          //sending a type of upvoted posts....

          $response = $this->json('GET' , 'api/auth/viewUpOrDownvotedPosts' , ['type' => 0] , $headers);
          $posts = $response->json('posts');

          //testing the are already posts...

          $this->assertTrue($this->checkPosts($posts) == 1);

          //testing that they are already upvoted by the user...


          $this->assertTrue($this->checkDownvoted($posts,'amro') == 1);


          $logout = $this->json('POST', 'api/auth/signOut')->withHeaders([
              'Authorization' => "Bearer $token"
          ]);


  }
}
