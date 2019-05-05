<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Link;

class viewCommentsTest extends TestCase
{
    public function checkComments($comments, $username)
    {
        foreach ($comments as $comment) {
            foreach ($comment['comments'] as $comm) {
                if (! Link::isCommentByUser($comm['comment_id'], $username) || ! Link::isCommentOrReplyOfPost($comm['comment_id'], $comment['post']['post_id'])) {
                    return 0;
                }
            }
        }

        return 1;
    }

    public function testAuthorizedAndUnauthorized()
    {
        // username is missed

        $this->json('GET', 'api/v1/unauth/viewComments')->assertStatus(403)->assertJson([
            "success" => "false",
            "error" => "username is required"
        ]);

        //comments of user "ahmed"

        $comments = $this->json('GET', 'api/v1/unauth/viewComments', ['username' => 'ahmed']);
        $comments->assertStatus(200);

        $this->assertTrue($this->checkComments($comments->json(), 'ahmed') == 1);

        //comments of user "menna"

        $comments = $this->json('GET', 'api/v1/unauth/viewComments', ['username' => 'menna']);
        $comments->assertStatus(200);

        $this->assertTrue($this->checkComments($comments->json(), 'menna') == 1);

        //comments of user "amro"

        $comments = $this->json('GET', 'api/v1/unauth/viewComments', ['username' => 'amro']);
        $comments->assertStatus(200);

        $this->assertTrue($this->checkComments($comments->json(), 'amro') == 1);
    }
}
