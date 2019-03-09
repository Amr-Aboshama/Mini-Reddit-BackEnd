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
}
