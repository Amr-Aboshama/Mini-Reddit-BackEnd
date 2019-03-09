<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{

     /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string reuired the token of the current user
     * @response {"blockedList": ["John Smith"]}
     */
	
	public function showMyBlockedUsers() 
	{
	    // ...
	}

	/**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam username string required the username of the user being un/blocked
     * @response 200 
     */
	
	public function blockOrUnblockUser() 
	{
	    // ...
	}

}
