<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewHiddenPostsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUnauthorized()
    {
          $this->json('GET' , 'api/auth/viewHiddenPosts' , [])->assertStatus(401)->assertJson([
              'success' => 'false',
              "error" => "UnAuthorized"
          ]);
    }
}
