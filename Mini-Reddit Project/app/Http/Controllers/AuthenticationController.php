<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\User;
use App\PasswordReset;
use App\UsersTokens;
use Validator;
use Mail;

/**
 * @group Authentication
 * sign in , sign up .....etc
 */
class AuthenticationController extends Controller
{
    /**
     * Sign in a user.
     *
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
        $valid = Validator::make($request->all(), [
            'username' => 'required|min:4',
            'password' => 'required|min:8',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }

        $credentials = ['username' => $request->username, 'password' => $request->password];

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => 'false',
                'error' => 'username and password don\'t matched',
            ], 404);
        }

        UsersTokens::insertToken([
            'username' => $request->username,
            'token' => $token,
            'expires_at' => Carbon::createFromTimestamp(auth()->getPayload()['exp'])->toDateTimeString(),
        ]);

        return response()->json([
            'success' => 'true',
            'token' => $token,
        ], 200);
    }

    /**
     * Signup a user.
     *
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
     */
    public function signUp(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required|unique:users|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }

        $user = User::storeUser([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = auth()->login($user);

        UsersTokens::insertToken([
            'username' => $request->username,
            'token' => $token,
            'expires_at' => Carbon::createFromTimestamp(auth()->getPayload()['exp'])->toDateTimeString(),
        ]);

        return response()->json([
            'success' => 'true',
            'token' => $token,
        ], 200);
    }

    /**
     * Send Email to Reset Password.
     *
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
    public function forgetPassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'email' => 'required|exists:users',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'email doesn\'t exist',
            ], 404);
        }
        $email = $request->email;
        $hash = PasswordReset::createPasswordReset($email);

        Mail::send('Mail.ForgettingPassword', compact('hash'), function ($message) use ($email) {
            $message->to($email)->subject('Mini-Reddit Reset Password');
        });

        return response()->json([
            'success' => 'true',
        ], 200);
    }

    /**
     * Reset User Password after receiving a mail.
     *
     * @bodyParam new_password string required The new password of the user .
     * @bodyParam password_confirmation string required The new password confirmation of the user .
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "Passwords don't match"
     * }
     *
     * @response 404 {
     * 	"success": "false",
     * 	"error": "Link is wrong or expired"
     * }
     */
    public function resetPassword(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'password' => 'required|confirmed|min:8',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Passwords don\'t match',
            ], 403);
        }

        // Get the email of the hash and delete the hash
        if (!$email = PasswordReset::getEmailByHash($request->hash)) {
            return response()->json([
              'success' => 'false',
              'error' => 'Link is wrong or expired',
            ], 404);
        }

        $username = User::getUserWholeRecordByEmail($email)->username;
        $tokens = UsersTokens::getTokensByUsername($username);

        $dummy_user = User::storeUser([
          'username' => Str::random(20),
          'password' => Str::random(10),
          'email' => Str::random(20),
        ]);

        // For each token invalidate it by set it for dummy user then invalidate it
        foreach ($tokens as $token) {
            auth()->login($dummy_user);
            auth()->setToken($token);
            auth()->logout();
        }
        $dummy_user->delete();
        UsersTokens::removeByUsername($username);

        User::changeUserPassword($username, $request->password);

        return response()->json([
          'success' => 'true',
        ], 200);
    }

    /**
     * Sign Out a user.
     *
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
        UsersTokens::removeByToken((string) JWTAuth::getToken());
        auth()->logout();

        return response()->json([
            'success' => 'true',
        ], 200);
    }
}
