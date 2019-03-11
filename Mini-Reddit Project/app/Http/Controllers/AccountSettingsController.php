<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @group Account settings
 */
class AccountSettingsController extends Controller
{
    /**
     * Delete current user account
     * @authenticated
     * @bodyParam password string required the password of te current user
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "password isn't correct"
     * }
     */
		public function deleteMyAccount()
		{
		    // ...
		}


		/**
		 * Change current user password
     * @bodyParam password string required the current password of the current user
     * @bodyParam new_password string required the new password of the current user
     * @bodyParam confirm_new_password string required the new password of the current user
     * @authenticated
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 404 {
     * 	"success": "false",
     * 	"error": "new password doesn't match the confirmation"
     * }
     *
     * @response 404 {
     * 	"success": "false",
     * 	"error": "wrong old passwords"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     */
		public function changePassword()
		{
		    // ...
		}
}
