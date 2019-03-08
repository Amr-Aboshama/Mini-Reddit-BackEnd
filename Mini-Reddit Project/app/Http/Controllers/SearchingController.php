<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchingController extends Controller
{
    /**
     *
     * @group Search
     * This is used to search for a community or a user.
     * 
     * @bodyParam userName string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam searchContent string required The string the user searching for.
     * 
     */
    public function search ($userName,$token,$searchContent)
    {

    }
}
