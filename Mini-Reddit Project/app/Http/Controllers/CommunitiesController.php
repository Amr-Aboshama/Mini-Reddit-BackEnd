<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribtion;
use App\Community;
use App\User;
use App\ModerateCommunity;
use Validator;

/**
 * @group Communities
 * all community features are handled by the following APIs
 */
class CommunitiesController extends Controller
{
    /**
     * View the communities which the user has subscribed.
     *
     * @bodyParam username string required the username of the user who has the communities.
     * @response 200{
     *   "success" : "true",
     *   "communities" : [{
     *    "community_id": 5,
     *    "community_name": "logic",
     *    "community_logo": "storage/app/logo1.jpg"
     *   }, {
     *    "community_id": 10,
     *    "community_name": "micro",
     *    "communtiy_logo": "storage/app/logo2.jpg"
     *   }]
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "username doesn't exist"
     * }
     * @response 422 {
     * 	"success": "false",
     * 	"error": "Invalid or some data missed"
     * }
     */
    public function viewUserCommunities(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'username' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $existance = User::userExist($request->username);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "username doesn't exist",
            ], 403);
        }

        $communities_subscribed = Subscribtion::subscribed_communities_data($request->username);

        $i = 0;
        foreach ($communities_subscribed as $community) {
            $communities[$i]['community_id'] = $community->community_id;
            $communities[$i]['community_name'] = $community->name;
            if ($community->community_logo) {
                $communities[$i]['community_logo'] = 'storage/app/avatars/'.$community->community_logo;
            } else {
                $communities[$i]['community_logo'] = $community->community_logo;
            }
            ++$i;
        }

        return response()->json(['success' => 'true',
            'communities' => $communities,
        ], 200);
    }

    /**
     * View information of a specific community.
     *
     * @bodyParam community_id id required The ID of the community the user want to show its rules and  description.
     * @response 200{
     *    "success": "true",
     *    "name": "Potterheads",
     *    "rules": "You shouldn't post a harmful posts",
     *    "desription": "This Community is for Potterheads",
     *    "num_subscribes": 30,
     *    "banner": "storage/app/banner.jpg",
     *    "logo": "storage/app/logo.jpg",
     *    "subscribed" : "false",
     *    "moderator":"true"
     *
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "community doesn't exist"
     * }
     * @response 422 {
     * 	"success": "false",
     * 	"error": "Invalid or some data missed"
     * }
     */
    public function viewCommunityInformation(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }
        $auth_user;
        try {
            $user = auth()->userOrFail();
            $auth_user = Subscribtion::subscribed($request->community_id, $user->username);
            $user_moderate = ModerateCommunity::checkExisting($request->community_id, $user->username);
        } catch (\Tymon\JWTAuth\Exceptions\UserNotDefinedException $e) {
            $auth_user = false;
            $user_moderate = false;
        }
        $number_sub = Subscribtion::numberOfSubscriptions($request->community_id);
        $community = Community::getCommunity($request->community_id);
        if ($community) {
            return response()->json([
                'success' => 'true',
                'name' => $community->name,
                'rules' => $community->rules,
                'desription' => $community->description,
                'num_subscribes' => $number_sub,
                'banner' => $community->community_banner,
                'logo' => $community->community_logo,
                'subscribed' => $auth_user,
                'moderator' => $user_moderate,
            ], 200);
        }
    }

    /**
     * Edit community rules or/and description.
     *
     * @authenticated
     * @bodyParam community_id int required The ID of the community the user want to edit its rules& description.
     * @bodyParam rules_content string required The edited rules of the community.
     * @bodyParam banner file required The banner of the community.
     * @bodyParam des_content string required The edited discription of the community.
     * @bodyParam logo file required The logo of the community.
     *
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "this user is not a moderator"
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "community doesn't exist"
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "invalid logo"
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "invalid banner"
     * }
     * @response 422 {
     * 	"success": "false",
     * 	"error": "Invalid or some data missed"
     * }
     */
    public function editCommunity(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
            'rules_content' => 'required',
            'des_content' => 'required',
            'banner' => 'required',
            'logo' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }

        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }

        $user_moderation = ModerateCommunity::checkExisting($request->community_id, $user->username);
        if (!$user_moderation) {
            return response()->json([
                'success' => 'false',
                'error' => 'this user is not a moderator',
            ], 403);
        }
        $valid = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'invalid logo',
            ], 403);
        }
        $valid = Validator::make($request->all(), [
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'invalid banner',
            ], 403);
        }

        $new_name_logo = $request->community_id.'logo.'.request()->logo->getClientOriginalExtension();

        $request->logo->storeAs('avatars', $new_name_logo);

        $new_name_banner = $request->community_id.'banner.'.request()->banner->getClientOriginalExtension();

        $request->banner->storeAs('avatars', $new_name_banner);

        $edited = Community::editCommunity($request->community_id, $request->rules_content, $request->des_content, $new_name_banner, $new_name_logo);
        if ($edited) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
    }

    /**
     * Create a community.
     *
     * @authenticated
     * @bodyParam community_name string required The Name of the community to be created.
     * @response 200 {
     *  "success": "true",
     *  "community_id": 5
     * }
     * @response 401 {
     *  "success": "false",
     *  "error" : "UnAuthorized "
     * }
     * @response 403 {
     *  "success": "false",
     *  "error" : "you have to complete 30 days "
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "this name already exists"
     * }
     * @response 422 {
     * 	"success": "false",
     * 	"error": "Invalid or some data missed"
     * }
     */
    public function createCommunity(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'community_name' => 'required|min:3',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $user = auth()->user();

        $current_date_time = now();
        $user_cake_date = $user->cake_date;
        $diff_in_days = $current_date_time->diffInDays($user_cake_date);
        if ($diff_in_days < 30) {
            return response()->json([
                'success' => 'false',
                'error' => 'you have to complete 30 days ',
            ], 403);
        }


        $community_name_existance = Community::communityNameExist($request->community_name);
        if ($community_name_existance) {
            return response()->json([
                'success' => 'false',
                'error' => 'this name already exists',
            ], 403);
        }

        $new_community = Community::createDummyCommunity($request->community_name);
        if ($new_community) {
            $new_moderator = ModerateCommunity::store($new_community->community_id, $user->username);
            if ($new_moderator) {
                return response()->json([
                    'success' => 'true',
                    'community_id' => $new_community->community_id,
                ], 200);
            } else {
                Community::removeCommunity($new_community->community_id);
            }
        }
    }

    /**
     * Remove an existing community.
     *
     * @authenticated
     * @bodyParam community_id int required The ID of the community to be removed.
     * @response 200 {
     *  "success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "community doesn't exist"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "this user is not a moderator"
     * }
     * @response 422 {
     * 	"success": "false",
     * 	"error": "Invalid or some data missed"
     * }
     */
    public function removeCommunity(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }

        $user_moderation = ModerateCommunity::checkExisting($request->community_id, $user->username);
        if (!$user_moderation) {
            return response()->json([
                'success' => 'false',
                'error' => 'this user is not a moderator',
            ], 403);
        }

        $removal = Community::removeCommunity($request->community_id);
        if ($removal) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
    }

    /**
     * Add a moderator to a community.
     *
     * @authenticated
     * @bodyParam community_id int required The ID of the community to add a moderator for.
     * @bodyParam moderator_username string required The username of the moderator to be set for the community.
     * @response 200 {
     *  "success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "user doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "community doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "user is already a moderator in that community"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "you are not a modirator to add another modirator"
     * }
     * @response 422 {
     *  "success": "false",
     *  "error": "Invalid or some data missed"
     * }
     */
    public function addModretorForCommunity(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
            'moderator_username' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $user = auth()->user();
        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }
        $current_user_modirate = ModerateCommunity::checkExisting($request->community_id, $user->username);
        if (!$current_user_modirate) {
            return response()->json([
                'success' => 'false',
                'error' => 'you are not a modirator to add another modirator',
            ], 403);
        }
        $user_exist = User::userExist($request->moderator_username);
        if (!$user_exist) {
            return response()->json([
                'success' => 'false',
                'error' => "user doesn't exist",
            ], 403);
        }

        $user_modirate = ModerateCommunity::checkExisting($request->community_id, $request->moderator_username);
        if ($user_modirate) {
            return response()->json([
                'success' => 'false',
                'error' => 'user is already a moderator in that community',
            ], 403);
        }
        $add_modirator = ModerateCommunity::store($request->community_id, $request->moderator_username);
        if ($add_modirator) {
            return response()->json([
              'success' => 'true',
          ], 200);
        }
    }

    /**
     * Remove a moderator from a community.
     *
     * @authenticated
     * @bodyParam community_id int required The ID of the community to remove a moderator from.
     * @bodyParam moderator_username string required The username of the moderator to be removed from the community.
     * @response 200 {
     *  "success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "user doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "community doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "user isn't a moderator already in that community"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "you are not a modirator to remove another modirator"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "there is no moderators except you"
     * }
     * @response 422 {
     *  "success": "false",
     *  "error": "Invalid or some data missed"
     * }
     */
    public function removeModretorFromCommunity(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
            'moderator_username' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }

        $user = auth()->user();
        $user_exist = User::userExist($request->moderator_username);
        if (!$user_exist) {
            return response()->json([
                'success' => 'false',
                'error' => "user doesn't exist",
            ], 403);
        }
        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }
        $current_user_modirate = ModerateCommunity::checkExisting($request->community_id, $user->username);
        if (!$current_user_modirate) {
            return response()->json([
                'success' => 'false',
                'error' => 'you are not a modirator to remove another modirator',
            ], 403);
        }
        $user_modirate = ModerateCommunity::checkExisting($request->community_id, $request->moderator_username);
        if (!$user_modirate) {
            return response()->json([
                'success' => 'false',
                'error' => "user isn't a moderator already in that community",
            ], 403);
        }
        $last_moderator = ModerateCommunity::numberOfModerators($request->community_id);
        if (1 == $last_moderator) {
            return response()->json([
              'success' => 'false',
              'error' => 'there is no moderators except you',
          ], 403);
        }
        $removed = ModerateCommunity::remove($request->moderator_username, $request->community_id);
        if ($removed) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
    }

    /**
     * view moderators of a specific community.
     *
     * @bodyParam community_id int required The ID of the community to view its modirators.
     * @response 200 {
     *  "success": "true",
     *   "moderators" : [{
     *   "moderator_username": "nour",
     *   "moderator_photo":"storage/app/photo2.jpg"
     *   }, {
     *   "moderator_username": "ahmed",
     *   "moderator_photo":"storage/app/photo1.jpg"
     *   }]
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "community doesn't exist"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 422 {
     *  "success": "false",
     *  "error": "Invalid or some data missed"
     * }
     */
    public function viewModeratorsCommunity(Request $request)
    {

        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }

        $moderators = ModerateCommunity::getModerators($request->community_id);

        $i = 0;
        foreach ($moderators as $moderator) {
            $comm_moderators[$i]['moderator_username'] = $moderator->username;
            if ($moderator->photo_url) {
                $comm_moderators[$i]['moderator_photo'] = 'storage/'.'app/'.'avatars/'.$moderator->photo_url;
            } else {
                $comm_moderators[$i]['moderator_photo'] = $moderator->photo_url;
            }
            ++$i;
        }

        return response()->json(['success' => 'true',
            'moderators' => $comm_moderators,
        ], 200);
    }

    /**
     * Subscribe a community.
     *
     * @authenticated
     * @bodyParam community_id int required The ID of the community to be un/subscribed.
     * @response 200 {
     *  "success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "community doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "user already is subscribed in that community"
     * }
     * @response 422 {
     *  "success": "false",
     *  "error": "Invalid or some data missed"
     * }
     */
    public function subscribeCommunity(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }

        $result = Subscribtion::subscribed($request->community_id, $user->username);
        if ($result) {
            return response()->json([
                'success' => 'false',
                'error' => 'user already is subscribed in that community',
            ], 403);
        }
        $creation = Subscribtion::store($user->username, $request->community_id);
        if ($creation) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
    }

    /**
     * Unsubscribe a community.
     *
     * @authenticated
     * @bodyParam community_id int required The ID of the community to be un/subscribed.
     * @response 200 {
     *  "success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "community doesn't exist"
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "user already is not subscribed in that community"
     * }
     * @response 422 {
     *  "success": "false",
     *  "error": "Invalid or some data missed"
     * }
     */
    public function unsubscribeCommunity(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'community_id' => 'required',
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'Invalid or some data missed',
            ], 422);
        }
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                'success' => 'false',
                'error' => "community doesn't exist",
            ], 403);
        }

        $result = Subscribtion::subscribed($request->community_id, $user->username);
        if (!$result) {
            return response()->json([
                'success' => 'false',
                'error' => 'user already is not subscribed in that community',
            ], 403);
        }
        $deletion = Subscribtion::remove($user->username, $request->community_id);
        if ($deletion) {
            return response()->json([
                'success' => 'true',
            ], 200);
        }
    }
}
