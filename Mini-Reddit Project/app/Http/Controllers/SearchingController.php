<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *@group Searching
 */

class SearchingController extends Controller
{
    /**
     * Search for a community or a user
     * @bodyParam search_content string required The string the user searching for.
     * @response 200{
     *  "usersContent": ["johnsmith", "stevenkay"],
     *  "communityContent" ["Ahly", "BackEnd"]
     * }
     *
     * @response 403 {
     *  "success": "false",
     * 	"error": "search content is empty"
     * }
     */
    public function search()
    {
        //
    }
}
