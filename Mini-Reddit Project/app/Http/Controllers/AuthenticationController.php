<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Authentication
 * sign in , sign up .....etc
 */

class AuthenticationController extends Controller
{
		/**
	   *
	   * Sign in a user
	   * @bodyParam my_username string required the username of the current user.
	   * @bodyParam password string required The password of the user.
	   * @response 200 {
	   * 	"success": "true",
	   * 	"token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
	   * }
	   *
	   * @response 404 {
	   * 	"success": "false",
	   * 	"error": "username and password don't matched"
	   * }
	   */
		public function signIn()
		{
				// ...
		}

		/**
	   *
	   * Signup a user
	   * @bodyParam my_username string required the username of the current user.
	   * @bodyParam password string required The password of the user.
	   * @bodyParam confirm_password string required The confirm password of the user.
	   * @bodyParam email string required The email of the user.
	   * @response 200 {
	   * 	"success": "true",
	   * 	"token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
	   * }
	   *
	   * @response 404 {
	   * 	"success": "false",
	   * 	"error": "username and password don't match"
	   * }
	   *
	   * @response 403 {
	   * 	"success": "false",
	   * 	"error": "user is logged in already"
	   * }
	   *
	   * @response 403 {
	   * 	"success": "false",
	   * 	"error": "email already exists"
	   * }
	   *
	   * @response 403 {
	   * 	"success": "false",
	   * 	"error": "username already exists"
	   * }
	   *
	   * @response 403 {
	   * 	"success": "false",
	   * 	"error": "passwords mismatch"
	   * }
	   */
		public function signUp()
		{
				// ...
		}

		/**
	   *
	   * Send Email to Reset Password [Under investigation]
	   * @bodyParam email string required The email of the user.
	   * @response 200 {
	   * 	"success": "true"
	   * }
	   *
	   * @response 404 {
	   * 	"success": "false",
	   * 	"error": "email doesn't exist"
	   * }
	   */
		public function forgetPassword()
		{
				// ...
		}

		/**
	   *
	   * Reset User Password after receiving a mail [Under investigation]
	   * @bodyParam new_password string required The new password of the user .
	   * @bodyParam confirm_new_password string required The new password confirmation of the user .
	   * @response 200 {
	   * 	"success": "true",
	   * 	"token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
	   * }
	   *
	   * @response 403 {
	   * 	"success": "false",
	   * 	"error": "Passwords don't match"
	   * }
	   *
	   * @response 404 {
	   * 	"success": "false",
	   * 	"error": "Link expired"
	   * }
	   */
		public function resetPassword()
		{
				// ...
		}


		/**
		 *
		 * Sign Out a user
		 * @authenticated
		 * @response 200{
		 * 	"success" :"true"
		 * }
		 *
		 * @response 401 {
     *  "success": "false",
     * 	"error": "User is not signed in"
     * }
		 */
		public function signOut()
		{
			// ...
		}
}
