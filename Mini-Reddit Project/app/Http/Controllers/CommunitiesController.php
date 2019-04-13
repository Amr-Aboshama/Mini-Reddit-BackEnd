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
     * View the communities which the user has subscribed
     * @bodyParam username string required the username of the user who has the communities.
     * @response 200{
     *   "success" : "true",
     *   "communities" : [{
     *   "community_id": 5
     *   }, {
     *   "community_id": 10
     *   }]
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
    public function viewUserCommunities(Request $request)
    {
        $existance = User::userExist($request->username);
        if (!$existance) {
            return response()->json([
                "success" => "false",
                "error" => "username doesn't exist"
            ], 403);
        }

        $communities_subscribed = Subscribtion::subscribed_communities($request->username);

        return response()->json(["success" => "true",
            'communities' => $communities_subscribed
        ], 200);
    }

    /**
     * View information of a specific community
     * @bodyParam community_id id required The ID of the community the user want to show its rules and  description.
     * @response 200{
     *    "success": "true",
     *    "name": "Potterheads",
     *    "rules": "You shouldn't post a harmful posts",
     *    "desription": "This Community is for Potterheads",
     *    "num_subscribes": 30,
     *    "banner": "storage/app/banner.jpg",
     *    "logo": "storage/app/logo.jpg"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "community doesn't exist"
     * }
     */
    public function viewCommunityInformation()
    {
        //...
    }


    /**
     * Edit community rules or/and description.
     * @authenticated
     * @bodyParam community_id int required The ID of the community the user want to edit its rules& description.
     * @bodyParam rules_content string required The edited rules of the community.
     * @bodyParam des_content string required The edited discription of the community.
     * @bodyParam banner file required The banner of the community.
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
     * @response 401 {
     * 	"success": "false",
     * 	"error": "unvalid logo"
     * }
     * @response 401 {
     * 	"success": "false",
     * 	"error": "unvalid banner"
     * }
     */
    public function editCommunity(Request $request)
    {
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                "success" => "false",
                "error" => "community doesn't exist"
            ], 403);
        }

        $user_moderation = ModerateCommunity::checkExisting($request->community_id, $user->username);
        if (!$user_moderation) {
            return response()->json([
                "success" => "false",
                "error" => "this user is not a moderator"
            ], 403);
        }
        $valid = Validator::make($request->all(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'unvalid logo',
            ], 401);
        }
        $valid = Validator::make($request->all(), [
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        if ($valid->fails()) {
            return response()->json([
                'success' => 'false',
                'error' => 'unvalid banner',
            ], 401);
        }


        $new_name_logo = $request->community_id.'logo.'.request()->logo->getClientOriginalExtension();

        $request->logo->storeAs('avatars', $new_name_logo);

        $new_name_banner = $request->community_id.'banner.'.request()->banner->getClientOriginalExtension();

        $request->banner->storeAs('avatars', $new_name_banner);

        $edited = Community::editCommunity($request->community_id, $request->rules_content, $request->des_content, $new_name_banner, $new_name_logo);
        if ($edited) {
            return response()->json([
                "success" => "true"
            ], 200);
        }
    }


    /**
     * Create a community
     * @authenticated
     * @bodyParam community_name string required The Name of the community to be created.
     * @response 200 {
     *  "success": "true",
     *  "community_id": 5
     * }
     * @response 403 {
     *  "success": "false",
     *  "error" : "some of the needed contents are missed"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error" : "you have to complete 30 days "
     * }
     *
     * @response 403 {
     *  "success": "false",
     *  "error": "this name already exists"
     * }
     */
    public function createCommunity(Request $request)
    {
        $user = auth()->user();

        $current_date_time = now();
        $user_cake_date = $user->cake_date;
        $diff_in_days = $current_date_time->diffInDays($user_cake_date);
        if ($diff_in_days < 30) {
            return response()->json([
                "success" => "false",
                "error" => "you have to complete 30 days "
            ], 401);
        }

        if (!$request->has('community_name') || $request->community_name == "") {
            return response()->json([

                'success' => 'false',
                'error' => "some of the needed contents are missed"

            ], 403);
        }

        $community_name_existance = Community::communityNameExist($request->community_name);
        if ($community_name_existance) {
            return response()->json([
                "success" => "false",
                "error" => "this name already exists"
            ], 403);
        }

        $new_community = Community::createDummyCommunity($request->community_name);
        if ($new_community) {
            $new_moderator = ModerateCommunity::store($new_community->community_id, $user->username);
            if ($new_moderator) {
                return response()->json([
                    "success" => "true",
                    "community_id" => $new_community->community_id
                ], 200);
            } else {
                Community::removeCommunity($new_community->community_id);
            }
        }
    }


    /**
     * Remove an existing community
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
     *
     */
    public function removeCommunity(Request $request)
    {
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                "success" => "false",
                "error" => "community doesn't exist"
            ], 403);
        }

        $user_moderation = ModerateCommunity::checkExisting($request->community_id, $user->username);
        if (!$user_moderation) {
            return response()->json([
                "success" => "false",
                "error" => "this user is not a moderator"
            ], 403);
        }


        $removal = Community::removeCommunity($request->community_id);
        if ($removal) {
            return response()->json([
                "success" => "true",
            ], 200);
        }
    }


    /**
     * Add a moderator to a community
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
     */
    public function addModretorForCommunity()
    {
    }


    /**
     * Remove a moderator from a community
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
     */
    public function removeModretorFromCommunity()
    {
    }

    /**
     * Subscribe a community
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
     */
    public function subscribeCommunity(Request $request)
    {
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                "success" => "false",
                "error" => "community doesn't exist"
            ], 403);
        }

        $result = Subscribtion::subscribed($request->community_id, $user->username);
        if ($result) {
            return response()->json([
                "success" => "false",
                "error" => "user already is subscribed in that community"
            ], 403);
        }
        $creation = Subscribtion::store($user->username, $request->community_id);
        if ($creation) {
            return response()->json([
                'success' => 'true'
            ], 200);
        }
    }

    /**
     * Unsubscribe a community
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
     */
    public function unsubscribeCommunity(Request $request)
    {
        $user = auth()->user();

        $existance = Community::communityExist($request->community_id);
        if (!$existance) {
            return response()->json([
                "success" => "false",
                "error" => "community doesn't exist"
            ], 403);
        }

        $result = Subscribtion::subscribed($request->community_id, $user->username);
        if (!$result) {
            return response()->json([
                "success" => "false",
                "error" => "user already is not subscribed in that community"
            ], 403);
        }
        $deletion = Subscribtion::remove($user->username, $request->community_id);
        if ($deletion) {
            return response()->json([
                'success' => 'true'
            ], 200);
        }
    }
}
