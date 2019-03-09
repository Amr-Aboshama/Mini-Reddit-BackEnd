<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
    /**
     * view the communities which the user has subscribed
     * @bodyParam username string required the username of the user who has the communities.
     * @response 200{
         "success" : "true",
     *   "communities" : [{
     *   "community_name":"Arduino",
     *   "community_logo":"logo1"
     *   }, {
     *   "community_name":"machine",
     *   "community_logo":"logo2"
     *   }]
     * }
     * @response 204{
     *   "success" : "true",
     *   "message" : "no communities to be shown"
     *   }
     */
		public function viewUserCommunities()
		{
			// ...
		}

    /**
     * This is used to view the Rules and Description of a community.
     * @bodyParam comm_id int required The ID of the community the user want to show its rules and  description.
     * @response 200{
     *    "success":"true"
     * }
     * @response 204{
     *   "success" : "true",
     *   "message" : "no rules to be shown"
     *   }
     */
        public function viewCommunitiesRulesDesc($my_username,$token,$comm_id)
        {
             //...
        }


    /**
     * This is used to edit the Rules and Description of a community.
     * @authenticated
     * @bodyParam comm_id int required The ID of the community the user want to edit its rules& description.
     * @bodyParam rules_content string required The edited rules of the community.
     * @bodyParam des_content string required The edited discription of the community.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
        public function editCommunity($my_username,$token,$comm_id,$rules_content,$des_content)
        {

        }


    /**
     * This is used by a user to create a community.
     * @authenticated
     * @bodyParam comm_name string required The Name of the community to be created.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 204 {
     *  "success": "false",
        "message" : "some of the needed contents are missed"
     * }
     * @response 401 {
     *  "success": "false",
     *  "message" : "you have to complete 30 days "
     * }
     */
        public function createCommunity($my_username,$token,$comm_name)
        {

        }


    /**
     * This is used to remove an existing community.
     * @authenticated
     * @bodyParam comm_id int required The ID of the community to be removed.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
        public function removeCommunity($my_username,$token,$comm_id)
        {

        }


    /**
     * This is used to add a moderator for an existing community.
     * @authenticated
     * @bodyParam comm_id int required The ID of the community to add a moderator for.
     * @bodyParam mod_username string required The username of the moderator to be set for the community.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
        public function addModretorForCommunity($my_username,$token,$comm_id,$mod_username)
        {

        }


    /**
     * This is used to remove an existing moderator of a community.
     * @authenticated
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community to remove a moderator from.
     * @bodyParam mod_username string required The username of the moderator to be removed from the community.
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
        public function removeModretorFromCommunity($my_username,$token,$comm_id,$mod_username)
        {

        }

	/**
     * This is used to subscribe an existing community.
     * @authenticated
     * @bodyParam comm_id int required The ID of the community to be un/subscribed.
     * @response 200 {
     *  "success": "true"
     * }
     */
        public function subscribeCommunity($my_username,$token,$comm_id)
        {

        }

	/**
     * This is used to unsubscribe an existing community.
     * @authenticated
     * @bodyParam comm_id int required The ID of the community to be un/subscribed.
     * @response 200 {
     *  "success": "true"
     * }
     */
		public function unsubscribeCommunity()
		{

		}
}
