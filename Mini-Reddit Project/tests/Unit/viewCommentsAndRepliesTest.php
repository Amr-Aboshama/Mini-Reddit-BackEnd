<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Link;

class viewCommentsAndRepliesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     public function doTheAlreadyBelong($links , $link_id)
     {
          foreach($links as $link)
          {
              if(Link::getParent($link['link_id']) != $link_id) {
                    return 0;
              }
          }
          return 1;
     }

     public static function sorted($links)
     {
        $date = "5000-03-22 19:05:53";
        foreach ($links as $link) {
            if ($link['link_date'] > $date) {
               return 0;
             }
             $date = $link['link_date'];
           }

       return 1;
     }

    public function testAll()
    {
        $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , [] )->assertStatus(403)->assertJson([
            'success' => 'false',
            'error' => 'the link_id is required'
        ]);

        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 1]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 1) == 1);
        $this->assertTrue($this->sorted($links)==1);


        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 2]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 2) == 1);
        $this->assertTrue($this->sorted($links)==1);


        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 11]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 11) == 1);
        $this->assertTrue($this->sorted($links)==1);


        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 12]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 12) == 1);
        $this->assertTrue($this->sorted($links)==1);

        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 13]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 13) == 1);
        $this->assertTrue($this->sorted($links)==1);

        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 14]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 14) == 1);
        $this->assertTrue($this->sorted($links)==1);


        $response = $this->json('GET' , 'api/v1/unauth/viewCommentsReplies' , ['link_id' => 2]);
        $response->assertStatus(200);
        $links = $response->json('comments');
        $this->assertTrue($this->doTheAlreadyBelong($links , 2) == 1);
        $this->assertTrue($this->sorted($links)==1);

    }
}
