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


	/**
		*following a user.

		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam UserName string required The username of the followed user.
		*bodyParam Token

		*@response 404 {
			"message" : "Sth wrong !!!!!!"
		} 

    */

   
	public function FollowUser()
	{

	}


	/**
		*following a user.

		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam UserName string required The username of the followed user.
		*bodyParam Token 

		*@response 404 {
			"message" : "Sth wrong !!!!!!"
		} 

    */

	public function UnfollowUser()
	{

	}



}
