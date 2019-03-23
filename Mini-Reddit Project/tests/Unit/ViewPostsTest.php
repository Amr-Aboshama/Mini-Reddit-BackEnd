<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Link;
use App\Following;
use App\Subscribtion;

class ViewPostsTest extends TestCase
{


     //function to check that posts are sorted by upvotes....

     public function checkPopular($posts)
     {

       $max_upvotes = 9E18;

       foreach($posts as $post)
       {
            if($post['upvotes'] > $max_upvotes)
            {
                return 0;
            }

            $max_upvotes = $post['upvotes'];
       }

       return 1;

     }

     //check that the posts are alredy belong to user .....

     public function checkPostOfUser($posts,$username)
     {
          foreach($posts as $post)
          {
               if($post['username'] != $username)
               {
                    return 0;
               }
          }

          return 1;
     }

     //check that they are alreadt posts

     public function checkPosts($posts)
     {
          foreach($posts as $post)
          {
               $parent = Link::getParent($post['post_id']);
               if($parent != null)
               {
                    return 0;
               }
          }

          return 1;
     }

     //check that posts are sorted by date

     public function checkNew($posts)
     {
          $date = "5000-03-22 19:05:53";
          foreach($posts as $post)
          {
               if($post['date'] > $date)
               {
                    return 0;
               }

               $date = $post['date'];
          }

          return 1;
     }

     //check that the posts already belong to a community ...

     public function checkCommunityPosts($posts , $community_id)
     {
          foreach($posts as $post)
          {
               if($post['community_id'] != $community_id)
               {
                     return 0;
               }
          }

          return 1;
     }

     public function checkHome($posts , $username)
     {
          foreach($posts as $post)
          {
               if(!Following::CheckExisting($username , $post['username']) && !Subscribtion::subscribed($post['community_id'] , $username))
               {
                    return 0;
               }
          }

          return 1;
     }

     public function checkBlocking($posts , $username)
     {
         foreach($posts as $post)
         {
              if(Blocking::blockedOrBlocker($post['author_username'] , $username))
              {
                   return 0;
              }
         }

         return 1;
     }


    public function testUnAuthorizedUsers()
    {
         // unauthorized user
         //home page
         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['page_type' => 0] );
         $posts = $response1->json('posts');
         //testing that posts are sorted by upvotes
         $this->assertTrue($this->checkPopular($posts) == 1);
         //home page
         $response1 = $this->json('GET','api/unauth/ViewPosts' , ['page_type' => 1] )->assertStatus(401)->assertJson([
           "success" => "false",
           "error" => "Something wrong!!"
         ]);
         //no parameters are sent
         $response1 = $this->json('GET','api/unauth/ViewPosts' , [] )->assertStatus(401)->assertJson([
           "success" => "false",
           "error" => "Something wrong!!"
         ]);


         //posts of user "ahmed"
         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['username' => 'ahmed'] );
         $posts = $response1->json('posts');
         //check that the posts are alredy belong to that user
         $this->assertTrue($this->checkPostOfUser($posts,'ahmed') == 1);
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);

         //posts of user "amr"

         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['username' => 'amro'] );
         $posts = $response1->json('posts');
         //check that the posts are alredy belong to that user
         $this->assertTrue($this->checkPostOfUser($posts,'amro') == 1);
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);

         //posts of user "nour"

         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['username' => 'nour'] );
         $posts = $response1->json('posts');
         //check that the posts are alredy belong to that user
         $this->assertTrue($this->checkPostOfUser($posts,'nour') == 1);
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);

         //posts of user "menna"

         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['username' => 'menna'] );
         $posts = $response1->json('posts');
         //check that the posts are alredy belong to that user
         $this->assertTrue($this->checkPostOfUser($posts,'menna') == 1);
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);

         //posts of user "reham"

         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['username' => 'reham'] );
         $posts = $response1->json('posts');
         //check that the posts are alredy belong to that user
         $this->assertTrue($this->checkPostOfUser($posts,'reham') == 1);
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);

         //posts of community 1

         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['community_id' => 1] );
         $posts = $response1->json('posts');
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);
         //check that they already belong to that community
         $this->assertTrue($this->checkCommunityPosts($posts , 1) == 1);

         //posts of community 2

         $response1 = $this->json('GET','api/unauth/ViewPosts' ,['community_id' => 2] );
         $posts = $response1->json('posts');
         //check that they are already posts not comments or replies
         $this->assertTrue($this->checkPosts($posts) == 1);
         //check that the are sorted by date
         $this->assertTrue($this->checkNew($posts) == 1);
         //check that they already belong to that community
         $this->assertTrue($this->checkCommunityPosts($posts , 2) == 1);



    }





    public function testAuthorizedUsers()
    {
        //log in
        $signin = $this->json('POST' , 'api/unauth/signIn' , ['username' => 'ahmed' , 'password' => '123456789' ]);
        $token = $signin->json('token');
        $headers = ["Authorization" => "Bearer $token"];

        //authorized user
        //popular page

        $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,['page_type' => 0] ,$headers);
        $posts = $response1->json('posts');
        //testing that posts are sorted by upvotes
        $this->assertTrue($this->checkPopular($posts) == 1);
        $this->assertTrue($this->checkBlocking($posts , 'ahmed') == 1);


        //no parameters are sent check that they are his posts
        $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,[] ,$headers);
        $posts = $response1->json('posts');
        $this->assertTrue($this->checkPostOfUser($posts,auth()->user()->username) == 1);
        $this->assertTrue($this->checkNew($posts) == 1);

        //homepage
        $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,['page_type' => 1] ,$headers);
        $posts = $response1->json('posts');
        $this->assertTrue($this->checkHome($posts ,auth()->user()->username) == 1);
        $this->assertTrue($this->checkNew($posts) == 1);
        $this->assertTrue($this->checkBlocking($posts , 'ahmed') == 1);



        //logingout

        $logout = $this->json('POST' , 'api/auth/signOut')->withHeaders([
           'Authorization' => "Bearer $token"
         ]);


         //log in
         $signin = $this->json('POST' , 'api/unauth/signIn' , ['username' => 'amro' , 'password' => '123456789' ]);
         $token = $signin->json('token');
         $headers = ["Authorization" => "Bearer $token"];

         //authorized user
         //popular page

         $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,['page_type' => 0] ,$headers);
         $posts = $response1->json('posts');
         //testing that posts are sorted by upvotes
         $this->assertTrue($this->checkPopular($posts) == 1);
         $this->assertTrue($this->checkBlocking($posts , 'amro') == 1);


         //no parameters are sent check that they are his posts
         $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,[] ,$headers);
         $posts = $response1->json('posts');
         $this->assertTrue($this->checkPostOfUser($posts,auth()->user()->username) == 1);
         $this->assertTrue($this->checkNew($posts) == 1);

         //homepage

         $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,['page_type' => 1] ,$headers);
         $posts = $response1->json('posts');
         $this->assertTrue($this->checkHome($posts ,auth()->user()->username) == 1);
         $this->assertTrue($this->checkNew($posts) == 1);
         $this->assertTrue($this->checkBlocking($posts , 'amro') == 1);

         //trying to view posts of blocked users

         $this->json('GET' , 'api/unauth/ViewPosts' , ['username' => 'ahmed'])->assertStatus(403)->assertJson([
           "success" => "false",
           "error" => "Something wrong!!"
         ]);

         //posts of community 1

         $response1 = $this->json( 'GET','api/unauth/ViewPosts' ,['community_id'=>1] ,$headers);
         $posts = $response1->json('posts');
         $this->assertTrue($this->checkCommunityPosts($posts , 1) == 1);
         $this->assertTrue($this->checkNew($posts) == 1);
         $this->assertTrue($this->checkBlocking($posts , 'amro') == 1);


         //logingout

         $logout = $this->json('POST' , 'api/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
          ]);

    }




}
