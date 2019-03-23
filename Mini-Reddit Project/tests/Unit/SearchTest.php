<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class SearchTest extends TestCase
{
    /**
     * test for the unpresence of the word (search_content) in the request
     * or for empty search content
     */
    public function testSearchWithNoContent()
    {

        $this->json('GET','api/unauth/search', ['search_content'=>null])
            ->assertStatus(403)
            ->assertJson([
              "success" => "false",
              "error" => "search content is empty"
            ]);

        $this->json('GET','api/unauth/search', [])
            ->assertStatus(403)
            ->assertJson([
              "success" => "false",
              "error" => "search content is empty"
            ]);
    }


    /**
     * test for valid search content
     */
    public function testSearchWithContent()
    {
        $user = new \App\User;
        $user = $user = User::storeUser([
              'username' => 'testo2',
              'email' => 'testo2@test.com',
              'password' => 'armne123456',
          ]);

        $community = new \App\community;
        $community = $community->createDummyCommunity('testo2');

        $payload = ['search_content'=>'testo2'];

        $this->json('GET','api/unauth/search', ['search_content'=>'testo'])
            ->assertStatus(200)
            ->assertJson([
              "usernames" => ["testo2"],
              "community_IDs" => [$community->community_id]
            ]);


        $user->delete();
        $community->delete();

    }


}
