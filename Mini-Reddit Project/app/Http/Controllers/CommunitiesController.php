<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @response 204{
     *   "success" : "true",
     *   "error" : "no communities to be shown"
     *   }
     */
		public function viewUserCommunities()
		{
			// ...
		}

    /**
     * View rules and description of a specific community
     * @bodyParam comm_id int required The ID of the community the user want to show its rules and  description.
     * @response 200{
     *    "success":"true"
     * }
     * @response 204{
     *   "success" : "true",
     *   "error" : "no rules to be shown"
     *   }
     */
    public function viewCommunitiesRulesDesc()
    {
         //...
    }


    /**
     * Edit community rules or/and description.
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
    public function editCommunity()
    {

		}


    /**
     * Create a community
     * @authenticated
     * @bodyParam comm_name string required The Name of the community to be created.
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
     * @respone 403 {
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
     * @bodyParam comm_id int required The ID of the community to be removed.
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
     * @bodyParam comm_id int required The ID of the community to add a moderator for.
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
     * @bodyParam comm_id int required The ID of the community to remove a moderator from.
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
	   * @bodyParam comm_id int required The ID of the community to be un/subscribed.
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
    public function subscribeCommunity()
    {

    }

		/**
	   * Unsubscribe a community
	   * @authenticated
	   * @bodyParam comm_id int required The ID of the community to be un/subscribed.
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
		public function unsubscribeCommunity()
		{

		}
}
