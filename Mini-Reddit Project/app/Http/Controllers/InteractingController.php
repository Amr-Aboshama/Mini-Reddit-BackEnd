<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class InteractingController extends Controller
{

	/**
		* viewing the posts of a specific user or a community or both when you are on the home page.

	 	* @bodyParam MyUserName string required The username of the account owner. 
 		* @bodyParam UserName string if you visited another user profile this is his username.
 		* @bodyParam Token string required.
 		* @bodyParam CommunityId int if you want to show the posts of a specific community this is its id. 

 		*@response {

 			"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 }]
 		}

 		*@response 404 {
	
			"message" :"somethimg wrong!!!!"
 		}
 		
 	*/

    public function ViewPosts()
    {

    } 


    /**
    	* Viewing comments of a user on posts he/she has interacted with.

    	*@bodyParam MyUserName string required The username of the account owner. 
    	*@bodyParam UserName string required if you visited another user profile this is his username.
    	*@bodyParam Token string 

    	*@response {

 			"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "comment_id": 2 , "body" : "comment2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "comment_id": 3 , "body" : "comment3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 }]
 		}

 		*@response 404 {
	
			"message" :"somethimg wrong!!!!"
 		}
    */

    public function ViewComments( )
    {

    }



    /**
		*viewing comments of a specific post or replies of a specific comment
		
		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam Id int required the id of the post or the id of the comment.
		*bodyParam Token string 	

		*@response {

 			"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "comment_id": 2 , "body" : "comment2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "comment_id": 3 , "body" : "comment3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 }]
 		}

 		*@response 404 {
	
			"message" :"somethimg wrong!!!!"
 		}


    */


    public function ViewComments_RepliesOfPosts_Comments( )
    {

    }

    /**
		*view the upvoted posts of the user or the downvoted ones

		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam Type int required it is one for the upvoted posts and zero for the downvoted ones.
		*bodyParam Token 

		*@response {

 			"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 }]
 		}

 		*@response 404 {
	
			"message" :"somethimg wrong!!!!"
 		}




    */

    public function ViewUpVotedOrDownVotedPosts( )
    {

    }


	/**
		*view the overview of the user.

		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam Token 

    */


    public function ViewOverview( )
    {

    }

    /**
		*view the hidden posts by the user.

		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam Token 

		*@response {

 			"posts" :[ { "post_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "post_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "post_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 }]
 		}

 		*@response 404 {
	
			"message" :"somethimg wrong!!!!"
 		}

    */

    public function ViewHiddenPosts( )
    {

    }


    /**
		*view the saved links by the user.

		*bodyParam MyUserName string required The username of the account owner.
		*bodyParam Token

		*@response {

 			"links" :[ { "link_id": 1 , "body" : "post1" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "link_id": 2 , "body" : "post2" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0  } , { "link_id": 3 , "body" : "post3" ,"username": "ahmed" , "votes" : 15 , "date":" 2 days ago " , "comments_Num" : 0 }]
 		}

 		*@response 404 {
	
			"message" :"somethimg wrong!!!!"
 		} 



    */




    public function ViewSavedLinks( )
    {

    }






}






