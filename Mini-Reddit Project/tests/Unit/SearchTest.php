<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Community;

class SearchTest extends TestCase
{
    /**
     * test for the unpresence of the word (search_content) in the request
     * or for empty search content
     */
    public function testSearchWithNoContent()
    {
        $this->json('GET', 'api/v1/unauth/search', ['search_content' => null])
            ->assertStatus(403)
            ->assertJson([
                "success" => "false",
                "error" => "search content is empty"
            ]);

        $this->json('GET', 'api/v1/unauth/search', [])
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
        $user = User::storeUser([
            'username' => 'testo2zzzzzz',
            'email' => 'testo2@test.com',
            'password' => 'armne123456',
        ]);

        $community = community::createDummyCommunity('testo2');

        $payload = ['search_content' => 'testo2'];

        $this->json('GET', 'api/v1/unauth/search', ['search_content' => 'testo'])
            ->assertStatus(200)
            ->assertJson([
                "usernames" => ["testo2zzzzzz"],
                "community_IDs" => [$community->community_id]
            ]);


        $user->delete();
        $community->delete();
    }

    public function testSearchNonBlocked()
    {
        $blocker = User::storeUser([
            'username' => 'testozzzzzzzz',
            'email' => 'testo25@test.com',
            'password' => 'armne123456',
        ]);

        $blocked = User::storeUser([
            'username' => 'testo55ZX',
            'email' => 'testo55@test.com',
            'password' => 'armne123456',
        ]);

        $community = Community::createDummyCommunity('test');

        $token = auth()->login($blocker);
        auth()->login($blocked);

        $headers = [$token];
        $payload = ['search_content' => 'tes'];
        $this->json('GET', 'api/v1/unauth/search', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                "usernames" => [],
                "community_IDs" => [$community->community_id]
            ]);

        $community->delete();
        $blocker->delete();
        $blocked->delete();
    }
}
