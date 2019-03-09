<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{

      /**
       *@group UserInformation
       * APIs for managing user information 
       * @bodyParam my_username string required the username of the current user.
       * @bodyParam token string required the token of the user and it is required for authontication.
       * @response 200{
       *  "email":"john_bb@gmail"
       * }
       */
      public function viewPrivateUserInfo(){
		// ...
	}

	/**
       *@group UserInformation
       * APIs for managing user information 
       * @bodyParam my_username string required the username of the current user.
       * @bodyParam token string required the token of the user and it is required for authontication.
       * @response 200{
       *  "username": "john",
       *  "karma":500,
       *  "cake_day":"March 8, 2019",
       *  "about":"be or not to be"
       * }
       */
	public function viewPublicUserInfo(){
		// ...
	}
}
