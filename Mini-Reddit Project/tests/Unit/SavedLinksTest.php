<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\SavedLink;
use App\Link;

class SavedLinksTest extends TestCase
{
    public function checkSaved($links, $username)
    {
        foreach ($links as $link) {
            if ($link['type'] == 'post') {
                if (! SavedLink::isSaved($link['post_id'], $username)) {
                    return 0;
                }
            } else {
                foreach ($link['comments'] as $comment) {
                    if (! SavedLink::isSaved($comment['comment_id'], $username) || ! Link::isCommentOrReplyOfPost($comment['comment_id'], $link['post']['post_id'])) {
                        return 0;
                    }
                }
            }
        }

        return 1;
    }

    public function testUnauthorizedUsers()
    {
        $this->json('GET', 'api/auth/viewSavedLinks')->assertStatus(401)->assertJson([
            "success" => "false",
            "error" => "UnAuthorized"
        ]);
    }

    public function testAuthorizedUsers()
    {
        //logging in a user "ahmed"...

        $signIn = $this->json('POST', 'api/unauth/signIn', ['username' => 'ahmed' , 'password' => '123456789']);
        $token = $signIn->json('token');
        $headers = ["Authorization" => "Bearer $token"];

        $response = $this->json('GET', 'api/auth/viewSavedLinks', [], $headers);
        $links = $response->json();

        $this->assertTrue($this->checkSaved($links, 'ahmed') == 1);

        //logging out

        $logout = $this->json('POST', 'api/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);



        $signIn = $this->json('POST', 'api/unauth/signIn', ['username' => 'amro' , 'password' => '123456789']);
        $token = $signIn->json('token');
        $headers = ["Authorization" => "Bearer $token"];

        $response = $this->json('GET', 'api/auth/viewSavedLinks', [], $headers);
        $links = $response->json();

        $this->assertTrue($this->checkSaved($links, 'amro') == 1);

        //logging out

        $logout = $this->json('POST', 'api/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);


        $signIn = $this->json('POST', 'api/unauth/signIn', ['username' => 'menna' , 'password' => '123456789']);
        $token = $signIn->json('token');
        $headers = ["Authorization" => "Bearer $token"];

        $response = $this->json('GET', 'api/auth/viewSavedLinks', [], $headers);
        $links = $response->json();

        $this->assertTrue($this->checkSaved($links, 'menna') == 1);

        //logging out

        $logout = $this->json('POST', 'api/auth/signOut')->withHeaders([
            'Authorization' => "Bearer $token"
        ]);
    }
}
