<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunitiesController extends Controller
{
     /**
      *@group Communities
      * APIs for managing communities 
      * @bodyParam my_username string required the username of the current user.
      * @bodyParam username string required the username of the user who has the communities.
      * @bodyParam token string required the token of the user and it is required for authontication.
      * @response 200{
      *   "communities" : [{
      *   "community_name":"Arduino",
      *   "community_logo":"logo1"
      *   }, {
      *   "community_name":"machine", 
      *   "community_logo":"logo2"
      *   }]
      * }
      */
	public function viewUserCommunities(){
		// ...
	}

    /**
     *
     * @group View Community Rules& Description
     * This is used to view the Rules and Description of a community.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community the user want to show its rules and description.
     * 
     */
    public function viewCommRulesDesc ($my_username,$token,$comm_id)
    {

    }


    /**
     *
     * @group Edit Community Rules& Description
     * This is used to edit the Rules and Description of a community.
     * 
     * @bodyParam my_username string required The username of the current user "should be the moderator of the community".
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community the user want to edit its rules& description.
     * @bodyParam rules_content string required The edited rules of the community.
     * @bodyParam des_content string required The edited discription of the community.
     * 
     */
    public function editComm ($my_username,$token,$comm_id,$rules_content,$des_content)
    {

    }


   /**
     *
     * @group Create Community
     * This is used to create a new community.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_name string required The Name of the community to be created.
     * 
     */
    public function createComm ($my_username,$token,$comm_name)
    {

    } 


    /**
     *
     * @group Remove Community
     * This is used to remove an existing community.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community to be removed.
     * 
     */
    public function removeComm ($my_username,$token,$comm_id)
    {

    } 


    /**
     *
     * @group Add moderator
     * This is used to add a moderator for an existing community.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community to add a moderator for.
     * @bodyParam mod_username string required The username of the moderator to be set for the community.
     * 
     */
    public function addModretorForComm ($my_username,$token,$comm_id,$mod_username)
    {

    }
    
    
    /**
     *
     * @group Remove moderator
     * This is used to remove an existing moderator of a community.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community to remove a moderator from.
     * @bodyParam mod_username string required The username of the moderator to be removed from the community.
     * 
     */
    public function removeModretorFromComm ($my_username,$token,$comm_id,$mod_username)
    {

    }


    /**
     *
     * @group subscription a Community
     * This is used to subscribe or unsubscribe an existing community.
     * 
     * @bodyParam my_username string required The username of the current user.
     * @bodyParam token string required The token of the current user.
     * @bodyParam comm_id int required The ID of the community to be un/subscribed.
     * 
     */
    public function subscriptionComm ($my_username,$token,$comm_id)
    {

    }
}

