<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingController extends Controller
{

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
