<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpvotedPostTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
      $response = $this->withHeaders([
       'HTTP_Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC91bmF1dGhcL3NpZ25JbiIsImlhdCI6MTU1MzExNTg1NiwiZXhwIjoxNTUzNzIwNjU2LCJuYmYiOjE1NTMxMTU4NTYsImp0aSI6IklwdXFYT1hINVZCUE9HNDgiLCJzdWIiOiJhbXIiLCJwcnYiOiI4N2UwYWYxZWY5ZmQxNTgxMmZkZWM5NzE1M2ExNGUwYjA0NzU0NmFhIn0.Cr1nHJ53OrVrnFFNdLsSiKeZpOHG-qERIU2bvVjFMPg'
     ])-json('POST', 'api/auth/upVoteLink', ['link_id' => 1 ])->assertStatus(200)->assertJson([
       'success' => 'true'
     ]);

    }
}
