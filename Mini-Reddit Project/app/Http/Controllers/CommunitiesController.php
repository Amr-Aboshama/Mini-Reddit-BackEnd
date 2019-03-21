<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribtion;
use App\Community;
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
     *   "community_name":"Arduino",
     *   "community_logo":"logo1"
     *   }, {
     *   "community_name":"machine",
     *   "community_logo":"logo2"
     *   }]
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "username doesn't exist"
     * }
     */
		public function viewUserCommunities(Request $request)
		{

            if(!$request->has('username'))
                {
                    return response()->json([
                        "success" => "false",
                        "error" => "username doesn't exist"
                    ],403);
                }
            
            $communities_subscribed=Subscribtion::subscribed_communities($request->username);
            $subscribed_communities = array();
            $i = 0;
            foreach( $communities_subscribed as $community_sub )
            {
                $subscribed_communities[$i]=(object)[
                    'community_name' => $community_sub->name,
                    'community_logo'=> $community_sub->community_logo];
                $i++;
           }
            return response()->json( (object)['communities'=>$subscribed_communities], 200);
			
		}

    /**
     * View rules and description of a specific community
     * @bodyParam community_id int required The ID of the community the user want to show its rules and  description.
     * @response 200{
     *    "success":"true"
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "community doesn't exist"
     * }
     */
    public function viewCommunitiesRulesDesc()
    {
         //...
    }


    /**
     * Edit community rules or/and description.
     * @authenticated
     * @bodyParam community_id int required The ID of the community the user want to edit its rules& description.
     * @bodyParam rules_content string required The edited rules of the community.
     * @bodyParam des_content string required The edited discription of the community.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success": "false",
     * 	"error": "community doesn't exist"
     * }
     */
    public function editCommunity()
    {

		}


    /**
     * Create a community
     * @authenticated
     * @bodyParam community_name string required The Name of the community to be created.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 204 {
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
		public function createCommunity()
		{

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
     */
    public function removeCommunity()
    {

    }


    /**
     * Add a moderator to a community
     * @authenticated
     * @bodyParam community_id int required The ID of the community to add a moderator for.
     * @bodyParam mod_username string required The username of the moderator to be set for the community.
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
     * @bodyParam mod_username string required The username of the moderator to be removed from the community.
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
        if(!$user)
        {
            return response()->json([
                        "success" => "false",
                        "error" => "UnAuthorized"
                    ],401);
        }
        $existance=Community::communityExist($request->community_id);
        if(!$existance)
        {
            return response()->json([
                        "success" => "false",
                        "error" => "community doesn't exist"
                    ],403);
        }
        
        $result=Subscribtion::subscribed($request->community_id , $user->user_name);
        if($result)
        {
            return response()->json([
                        "success" => "false",
                        "error" => "user already is subscribed in that community"
                    ],403);
        }
        $creation=Subscribtion::store($user->user_name , $request->community_id);
        if($creation)
        {
            return response()->json([
              'success' => 'true'
            ], 200 );
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
            if(!$user)
            {
                return response()->json([
                            "success" => "false",
                            "error" => "UnAuthorized"
                        ],401);
            }
            $existance=Community::communityExist($request->community_id);
            if(!$existance)
            {
                return response()->json([
                            "success" => "false",
                            "error" => "community doesn't exist"
                        ],403);
            }
            
            $result=Subscribtion::subscribed($request->community_id , $user->user_name);
            if(!$result)
            {
                return response()->json([
                            "success" => "false",
                            "error" => "user already is not subscribed in that community"
                        ],403);
            }
            $deletion=Subscribtion::remove($user->user_name , $request->community_id);
            if($deletion)
            {
                return response()->json([
                  'success' => 'true'
                ], 200 );
            }

		}
}
