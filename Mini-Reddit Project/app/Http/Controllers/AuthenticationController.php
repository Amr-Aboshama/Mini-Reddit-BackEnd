<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;

/**
 * @group Authentication
 * sign in , sign up .....etc
 */

class AuthenticationController extends Controller
{
		/**
	   *
	   * Sign in a user
	   * @bodyParam username string required the username of the current user.
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
	   *
	   * @response 422 {
	   * 	"success": "false",
	   * 	"error": "Invalid or some data missed"
	   * }
	   */
		public function signIn(Request $request)
		{
				$valid = Validator::make($request->all(),[
					'username' => 'required|min:4',
					'password' => 'required|min:8'
				]);
				if($valid->fails()) {
						return response()->json([
							'success' => 'false',
							'error' => 'Invalid or some data missed',
						],422);
				}

				$credentials = ['username' => $request->username, 'password' => $request->password];

				if(! $token = auth()->attempt($credentials)) {
					return response()->json([
						'success' => 'false',
						'error' => 'username and password don\'t matched',
					],404);
				}

				return response()->json([
					'success' => 'true',
					'token' => $token,
				],200);
		}

		/**
	   *
	   * Signup a user
	   * @bodyParam username string required the username of the current user.
	   * @bodyParam password string required The password of the user.
	   * @bodyParam password_confirmation string required The confirm password of the user.
	   * @bodyParam email string required The email of the user.
	   * @response 200 {
	   * 	"success": "true",
	   * 	"token": "6155cb365da1512356e99b6f8b5cb5757a28fb5baeae91503721fd201e61810be503e8167abad97c"
	   * }
	   *
	   * @response 422 {
	   * 	"success": "false",
	   * 	"error": "Invalid or some data missed"
	   * }
	   *
	   */
		public function signUp(Request $request)
		{

				$valid = Validator::make($request->all(),[
					'username' => 'required|unique:users|min:4',
					'email' => 'required|email|unique:users',
					'password' => 'required|confirmed|min:8'
				]);

				if($valid->fails()) {
					return response()->json([
						'success' => 'false',
						'error' => 'Invalid or some data missed'
					],422);
				}

				$user = User::storeUser([
					'username' => $request->username,
					'email' => $request->email,
					'password' => $request->password,
				]);

				$token = auth()->login($user);
				return response()->json([
					'success' => 'true',
					'token' => $token
				],200);
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
     * 	"error": "UnAuthorized"
     * }
		 */
		public function signOut()
		{
				auth()->logout();
				return response()->json([
					'success' => 'true'
				],200);
		}
}
