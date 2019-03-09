<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountSettingsController extends Controller
{

     /**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam password string required the password of te current user
     * @response 200
     */
	
	public function deleteMyAccount()
	{
	    // ...
	}

	/**
     * @bodyParam my_username string required the username of the current user
     * @bodyParam token string required the token of the current user
     * @bodyParam password string required the current password of the current user
     * @bodyParam new_password string required the new password of the current user
     * @bodyParam confirm_new_password string required the new password of the current user
     * @response 200
     * @response 404 {"message": "wrong password or the confirmed password 
     * did not match the new one"}
     */
	
	public function changePassword() 
	{
	    // ...
	}

}
