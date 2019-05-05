<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\HiddenPost;

class ViewHiddenPostsTest extends TestCase
{

    public function check_Hidden($posts , $username)
    {
        foreach($posts as $post) {
            if(!HiddenPost::hidden($post['post_id'] , $username)) {
                return 0;
            }
        }

        return 1;
    }

    public static function Sorted($posts)
    {
        $date = "5000-03-22 19:05:53";
        foreach ($posts as $post) {
            if ($post['date'] > $date) {
                return 0;
              }

              $date = $post['date'];
      }

      return 1;
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUnauthorized()
    {
          $this->json('GET' , 'api/v1/auth/viewHiddenPosts' , [])->assertStatus(401)->assertJson([
              'success' => 'false',
              "error" => "UnAuthorized"
          ]);


    }

    public function testAuthorized()
    {
        //log in
        $signin = $this->json('POST', 'api/v1/unauth/signIn', ['username' => 'ahmed' , 'password' => '123456789' ]);
        $token = $signin->json('token');
        $headers = ["Authorization" => "Bearer $token"];


        $response = $this->json('GET' , 'api/v1/auth/viewHiddenPosts' , [] , $headers);
        $response->assertStatus(200);
        $posts = $response->json('posts');
        $this->assertTrue($this->check_Hidden($posts , 'ahmed')==1);
        $this->assertTrue($this->Sorted($posts)==1);

        //logingout

        $logout = $this->json('POST', 'api/v1/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);


        //log in
        $signin = $this->json('POST', 'api/v1/unauth/signIn', ['username' => 'amro' , 'password' => '123456789' ]);
        $token = $signin->json('token');
        $headers = ["Authorization" => "Bearer $token"];


        $response = $this->json('GET' , 'api/v1/auth/viewHiddenPosts' , [] , $headers);
        $response->assertStatus(200);
        $posts = $response->json('posts');
        $this->assertTrue($this->check_Hidden($posts , 'amro')==1);
        $this->assertTrue($this->Sorted($posts)==1);

        //logingout

        $logout = $this->json('POST', 'api/v1/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);


        //log in
        $signin = $this->json('POST', 'api/v1/unauth/signIn', ['username' => 'menna' , 'password' => '123456789' ]);
        $token = $signin->json('token');
        $headers = ["Authorization" => "Bearer $token"];


        $response = $this->json('GET' , 'api/v1/auth/viewHiddenPosts' , [] , $headers);
        $response->assertStatus(200);
        $posts = $response->json('posts');
        $this->assertTrue($this->check_Hidden($posts , 'menna')==1);
        $this->assertTrue($this->Sorted($posts)==1);

        //logingout

        $logout = $this->json('POST', 'api/v1/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);

    }
}
