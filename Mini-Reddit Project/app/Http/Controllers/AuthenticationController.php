<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
		/**
	   *
	   * Login of a user
	   * @authenticated
	   * @bodyParam my_username string required the username of the current user.
	   * @bodyParam password string required The password of the user.
	   * @response 200{
	   * 	"success": "true",
	   * }
	   *
	   */
		public function login()
		{
				// ...
		}

		/**
	   *
	   * APIs for managing authentication
	   * @bodyParam my_username string required the username of the current user.
	   * @bodyParam password string required The password of the user.
	   * @bodyParam email string required The email of the user.
	   * @response 200{}
	   */
		public function signUp()
		{
				// ...
		}

		/**
	   *
	   * APIs for managing authentication
	   * @bodyParam email string required The email of the user.
	   * @response 200{}
	   */
		public function forgetPassword()
		{
				// ...
		}

		/**
	   *
	   * APIs for managing authentication
	   * @bodyParam my_new_password string required The new password of the user .
	   * @bodyParam my_new_password_confirm string required The new password confirmation of the user .
	   * @response 200{}
	   */
		public function resetPassword()
		{
				// ...
		}
}
