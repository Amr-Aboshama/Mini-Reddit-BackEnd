<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Link;

class viewOverviewTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    function isBelong($links , $username)
    {
        foreach($links as $link) {
            if($link['type'] == "post") {
                if($username != Link::getAuthor($link['post_id'])) {
                     return 0;
                }
            } else {
                foreach($link['comments'] as $comment) {
                    if($username != Link::getAuthor($comment['comment_id'])) {
                        return 0;
                    }

                    if(Link::getParent($comment['comment_id'] != $link['post']['post_id'])) {
                        return 0;
                    }
                }

            }

        }
        return 1 ;
    }

    public function testAll()
    {
        $this->json('GET' , 'api/v1/unauth/viewOverview' , [])->assertStatus(403)->assertJson([
            "success" => "false",
            "error" => "username is required"
        ]);

        $response = $this->json('GET' , 'api/v1/unauth/viewOverview' , ['username'=>'menna']);
        $response->assertStatus(200);
        $links = $response->json();
        $this->assertTrue($this->isBelong($links , 'menna')==1);

        $response = $this->json('GET' , 'api/v1/unauth/viewOverview' , ['username'=>'ahmed']);
        $response->assertStatus(200);
        $links = $response->json();
        $this->assertTrue($this->isBelong($links , 'ahmed')==1);


        $response = $this->json('GET' , 'api/v1/unauth/viewOverview' , ['username'=>'amro']);
        $response->assertStatus(200);
        $links = $response->json();
        $this->assertTrue($this->isBelong($links , 'amro')==1);

        $response = $this->json('GET' , 'api/v1/unauth/viewOverview' , ['username'=>'nour']);
        $response->assertStatus(200);
        $links = $response->json();
        $this->assertTrue($this->isBelong($links , 'nour')==1);

    }
}
