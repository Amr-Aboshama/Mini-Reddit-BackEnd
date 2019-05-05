<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpvotedLinkTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function testAuthorizedUpvote()
    {

      //signning In


        $signin = $this->json('POST', 'api/v1/unauth/signIn', ['username' => 'ahmed' , 'password' => '123456789' ]);
        $token = $signin->json('token');

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token"
        ])->json('POST', 'api/v1/auth/upvoteLink', ['link_id' => 1 ])->assertStatus(200)->assertJson([
            'success' => 'true',
        ]);

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token"
        ])->json('POST', 'api/v1/auth/upvoteLink', [])->assertStatus(403)->assertJson([
            'success' => 'false',
            'error' => 'link_id is required'
        ]);

        $response = $this->withHeaders([
            'Authorization' => "Bearer $token"
        ])->json('POST', 'api/v1/auth/upvoteLink', ['link_id' => 77])->assertStatus(403)->assertJson([
            'success' => 'false',
            'error' => "link_id doesn't exist!!"
        ]);

        //logingout

        $logout = $this->json('POST', 'api/v1/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);
    }

    public function testUnAuthorizedUpvote()
    {
        $response = $this->withHeaders([
            'Authorization' => ''
        ])->json('POST', 'api/v1/auth/upvoteLink', ['link_id' => 1 ])->assertStatus(401)->assertJson([
            'success' => 'false',
            "error" => "UnAuthorized"
        ]);
    }
}
