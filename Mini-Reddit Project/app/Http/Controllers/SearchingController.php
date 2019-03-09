<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchingController extends Controller
{
    /**
     * This is used to search for a community or a user.
     * @bodyParam search_content string required The string the user searching for.
     * @response 200{
     *  "usersContent": ["johnsmith", "stevenkay"],
     *  "communityContent" ["Ahly", "BackEnd"]
     * }
     */
    public function search()
    {
        //
    }
}
