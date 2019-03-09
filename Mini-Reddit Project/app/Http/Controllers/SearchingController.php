<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchingController extends Controller
{
    /**
     *
     *
     * This is used to search for a community or a user.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam search_content string required The string the user searching for.
     * 
     */
    public function search ($my_username,$token,$search_content)
    {

    }
}
