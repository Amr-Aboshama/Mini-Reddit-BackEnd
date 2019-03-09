<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingController extends Controller
{
    /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @response {"follwersList": ["John Smith"]}
     */
	
	public function viewMyFollowers() 
	{
	    // ...
	}

	/**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @response {"follwingList": ["John Smith"]}
     */
	
	public function viewMyFollowing() 
	{
	    // ...
	}

}
