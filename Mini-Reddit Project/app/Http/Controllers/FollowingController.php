<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowingController extends Controller
{

	/**
		*following a user.

		*bodyParam my_username string required The username of the account owner.
		*bodyParam username string required The username of the followed user.
		*bodyParam token

		*@response 404 {
			"message" : "Sth wrong !!!!!!"
		} 

    */

   
	public function FollowUser()
	{

	}


	/**
		*following a user.

		*bodyParam my_username string required The username of the account owner.
		*bodyParam user_name string required The username of the followed user.
		*bodyParam token 

		*@response 404 {
			"message" : "Sth wrong !!!!!!"
		} 

    */

	public function UnfollowUser()
	{

	}


}
