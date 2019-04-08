<?php

namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use App\User;
use App\Link;
use App\UpvotedLink;
use App\DownvotedLink;
use App\SavedLink;
use App\HiddenPost;
use App\Community;
use App\Blocking;
use App\Subscribtion;
use App\ModerateCommunity;
use Validator;

/**
 * @group Interacting Actions
 * posts , comments and anything related
 */


class InteractingController extends Controller
{
    /**
     * Hide a post
     * @bodyParam post_id integer required the id of the post that the user wants to hide
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "already hidden"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "The post doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only posts can be hidden"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There is something went wrong!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post_id is required"
     * }
     */
    public function hidePost(Request $request)
    {
        //token should be parsed to get the user name

        $user = auth()->user();

        if (!$request->has('post_id')) {
            return response()->json([

                'success' => 'false',
                'error' => 'post_id is required'

            ], 403);
        }
        //if the post is not existing
        $result = Link::checkExisting($request->post_id);
        if (!$result) {
            return response()->json([
                'success' => 'false',
                'error' => 'The post doesn\'t exist'
            ], 403);
        }
        //if the id is for comment or reply "not a post"
        $result = Link::getParent($request->post_id);
        if ($result) {
            return response()->json([
                'success' => 'false',
                'error' => 'Only posts can be hidden'
            ], 403);
        } else {   // the id belongs to a post
            $result=HiddenPost::hidden($request->post_id, $user->username);
            if($result){
                return response()->json([
                    'success' => 'false',
                    'error' => 'already hidden'
                ],403);
            } else {
                $result=HiddenPost::hidePost($request->post_id, $user->username);
                if($result){
                    return response()->json([
                        'success' => 'true'
                    ],200);
                } else {
                    return response()->json([
                        'success' => 'false',
                        'error' =>'There is something went wrong!'
                    ],403);
                }
            }
        }
    }


    /**
     * Unhide a post
     * @bodyParam post_id integer required the id of the post that the user wants to hide
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only posts can be unhidden!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post_id is required"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only hidden posts can be unhidden!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There is something went wrong!"
     * }
     */
    public function unhidePost(Request $request)
    {
        //token should be parsed to get the user name

        $user = auth()->user();

        if (!$request->has('post_id')) {
            return response()->json([

                'success' => 'false',
                'error' => 'post_id is required'

            ], 403);
        }
        //if the post is not hidden
        $result = HiddenPost::hidden($request->post_id, $user->username);
        if (!$result) {  //if the post is not hidden
            return response()->json([
                'success' => 'false',
                'error' => 'Only hidden posts can be unhidden!'
            ], 403);
        } else {   //if the post is hidden
            //if the id is for comment or reply "not a post"
            $result = Link::getParent($request->post_id);
            if ($result) {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Only posts can be unhidden!'
                ], 403);
            } else {
                $result=HiddenPost::unhidePost($request->post_id, $user->username);
                if($result){  //if the post undidden successfully
                    return response()->json([
                        'success' => 'true'
                    ],200);
                } else {
                    return response()->json([
                        'success' => 'false',
                        'error' => 'There is something went wrong!'
                    ],403);
                }
            }
        }
    }



    /**
     * Edit a post
     * @bodyParam post_id integer required the id of the post that the user wants to edit
     * @bodyParam new_title string the new title of the post
     * @bodyParam new_content string the new content of the post
     * @bodyParam new_image string the directory of the new image if there is .
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post must have a title"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post must have a content"
     * }
     */


    public function editPost()
    {
        // ...
    }

    /**
     * Edit a comment
     * @bodyParam comment_id integer required the id of the comment that the user wants to edit
     * @bodyParam new_content string the new content of the comment
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "comment must have a content"
     * }
     */
    public function editComment()
    {
        // ...
    }


    /**
     * Pin or unpin a post
     * @bodyParam post_id integer required the id of the post that the user wants to pin or unpin
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "The post doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post_id is required"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only posts can be pinned"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There is something went wrong!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "The user can pin only his own posts!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only moderators can pin posts in the community!"
     * }
     */
    public function pinOrUnpinPost(Request $request)
    {
        //token should be parsed to get the user name

        $user = auth()->user();

        if (!$request->has('post_id')) {
            return response()->json([

                'success' => 'false',
                'error' => 'post_id is required'

            ], 403);
        }
        //if the post is not existing
        $result = Link::checkExisting($request->post_id);
        if (!$result) {
            return response()->json([
                'success' => 'false',
                'error' => 'The post doesn\'t exist'
            ], 403);
        }
        //if the id is for comment or reply "not a post"
        $result = Link::getParent($request->post_id);
        if ($result) {
            return response()->json([
                'success' => 'false',
                'error' => 'Only posts can be pinned'
            ], 403);
        } else {   // the id belongs to a post
            $current_user = auth()->user()->username;
            $community_id = Link::getCommunity($request->post_id);
            if (!$community_id) {   //the post isn't in community
                if ($current_user == Link::getAuthor($request->post_id)) {
                    $result = Link::togglePinStatus($request->post_id);
                    if ($result) {
                        return response()->json([
                            'success' => 'true'
                        ], 200);
                    } else {
                        return response()->json([
                            'success' => 'false',
                            'error' => 'There is something went wrong!'
                        ], 403);
                    }
                } else {
                    return response()->json([
                        'success' => 'false',
                        'error' => 'The user can pin only his own posts!'
                    ], 403);
                }
            } else {       // the post is in a community
                if (ModerateCommunity::checkExisting($community_id, $current_user)) {
                    $result = Link::togglePinStatus($request->post_id);
                    if ($result) {
                        return response()->json([
                            'success' => 'true'
                        ], 200);
                    } else {
                        return response()->json([
                            'success' => 'false',
                            'error' => 'There is something went wrong!'
                        ], 403);
                    }
                } else {
                    return response()->json([
                        'success' => 'false',
                        'error' => 'Only moderators can pin posts in the community!'
                    ], 403);
                }
            }
        }
    }


    /**
     * Add Downvote to a post
     * @bodyParam link_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There is something went wrong!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "link_id is required"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "The Link doesn't exist"
     * }
     *
     *
     */
    public function downvoteLink(Request $request)
    {
        //token should be parsed to get the user name

        $user = auth()->user();

        if (!$request->has('link_id')) {
            return response()->json([

                'success' => 'false',
                'error' => 'link_id is required'

            ], 403);
        }

        $result = Link::checkExisting($request->link_id);
        if (!$result) {
            return response()->json([
                'success' => 'false',
                'error' => 'The Link doesn\'t exist'
            ], 403);
        }
        //if i can't remove the upvoted of the post
        $result = UpvotedLink::upvoted($request->link_id, $user->username);
        if ($result) {                    //check if the post is actually upvoted
            $result = UpvotedLink::remove($user->username, $request->link_id);
            if (!$result) {
                return response()->json([
                    'success' => 'false',
                    'error' => 'There is something went wrong!'
                ], 403);
            } else {
                Link::decrementUpvotes($request->link_id);
            }
        }
        //downvoting the post
        $result = DownvotedLink::downvoted($request->link_id, $user->username);
        //if the link is acually downvoted
        if ($result) {
            $result = DownvotedLink::remove($user->username, $request->link_id);

            if ($result) {
                Link::decrementDownvotes($request->link_id);

                return response()->json([
                    'success' => 'true'
                ], 200);
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'There is something went wrong!'
                ], 403);
            }
        }
        $result = DownvotedLink::store($user->username, $request->link_id);
        if ($result) {
            Link::incrementDownvotes($request->link_id);

            return response()->json([
                'success' => 'true'
            ], 200);
        } else {
            return response()->json([
                'success' => 'false',
                'error' => 'There is something went wrong!'
            ], 403);
        }
    }


    /**
     * Upvote Link
     * @bodyParam link_id integer required the id of the post that the user wants to downvote
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "link_id doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "link_id is required"
     * }
     *
     */

    public function upvoteLink(Request $request)
    {

        //token should be parsed to get the user name

        $username = auth()->user()->username;

        $valid = Validator::make($request->all(), [
            'link_id' => 'required'
        ]);

        if ($valid->fails()) {
            return response()->json([

                "success" => "false",
                "error" => "link_id is required"

            ], 403);
        }

        if (UpvotedLink::upvoted($request->link_id, $username)) {
            $result = UpvotedLink::remove($username, $request->link_id);
            Link::decrementUpvotes($request->link_id);

            return response()->json([
                "success" => "true"
            ], 200);
        }

        //go and upvote.....

        $result = UpvotedLink::store($username, $request->link_id);

        if (!$result) {
            return response()->json([

                "success" => "false",
                "error" => "link_id doesn't exist!!"

            ], 403);
        }

        Link::incrementUpvotes($request->link_id);

        //check if downvoted then undo ......

        if (DownvotedLink::downvoted($request->link_id, $username)) {
            Link::decrementDownvotes($request->link_id);
            $result = DownvotedLink::remove($username, $request->link_id);
        }

        return response()->json([
            "success" => "true"
        ], 200);
    }


    /**
     * Viewing the posts of a specific user or a community or both when you are on the home page or the popular page.
     * @bodyParam page_type int home or popular (1 for home , -1 for popular)
     * @bodyParam username string if you visited another user profile this is his username [Default null=>guest / my username=>user].
     * @bodyParam community_id int if you want to show the posts of a specific community this is its id [Default null].
     *@response 200 {
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"video_url" : "https://www.youtube.com","image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "laravel", "community_id": 1 , "subscribed" : "true","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false", "upvoted" : "true" , "downvoted" : "false", "pinned" : 1 } ,
     *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" ,"community" : "none", "community_id": null, "subscribed" : "false","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "hidden": "true", "upvoted" : "true" , "downvoted" : "false", "pinned" : 0 } ,
     *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" ,"community" : "none", "community_id": null, "subscribed" : "false","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "true", "upvoted" : "true" , "downvoted" : "false", "pinned" : 1 }]
     *}
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Something Wrong!!!"
     * }
     */

    public function ViewPosts(Request $request)
    {

            // firt see if the user is authoriazed or unauthorized.....

        $Auth = 1;
        $posts = [];
        try {
            $tokenFetch = JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            $Auth = 0;
        }

        if ($request->has('page_type')) {
            if ($request->page_type == 1) { //home page
                if (!$Auth) {
                    return response()->json([

                        "success" => "false",
                        "error" => "Something wrong!!"

                    ], 401);
                } else {
                    //posts by followers and communities excluding posts of blocked users
                    $posts = Link::homePosts(auth()->user()->username);
                }
            } else { //popular posts handling blockings
                if (!$Auth) {
                    $posts = Link::popularPosts();
                } else {
                    $posts = Link::popularPosts(auth()->user()->username);
                }
            }
        } elseif ($request->has('username')) { //return posts of this user
            if (!$Auth) {
                $posts = Link::getPosts()->where('author_username', $request->username)->orderBy('link_date', 'DESC')->get();
            } else {
                if (Blocking::blockedOrBlocker($request->username, auth()->user()->username)) {
                    return response()->json([

                        "success" => "false",
                        "error" => "Something wrong!!"

                    ], 403);
                }

                $posts = Link::getPosts()->where('author_username', $request->username)->orderBy('link_date', 'DESC')->get();
            }
        } elseif ($request->has('community_id')) { //return posts of community excluding blocked posts
            if (!$Auth) {
                $posts = Link::getPosts()->where('community_id', $request->community_id)->orderBy('link_date', 'DESC')->get();
            } else {
                $posts = Link::postsOfcommunity($request->community_id, auth()->user()->username);
            }
        } else {
            if (!$Auth) {
                return response()->json([

                    "success" => "false",
                    "error" => "Something wrong!!"

                ], 401);
            } else {
                $posts = Link::getPosts()->where('author_username', auth()->user()->username)->orderBy('link_date', 'DESC')->get();
            }
        }

        $renamed_posts = array();

        $i = 0;
        foreach ($posts as $post) {
            $renamed_posts[$i] =(object)[

                'post_id' => $post->link_id,
                'body' => $post->content,
                'video_url' => $post->video_url != null ? $post->video_url : -1 ,
                'image' => $post->content_image != null ? $post->content_image : -1,
                'title' => $post->title,
                'username' => $post->author_username,
                'community' => "none",
                'community_id' => $post->community_id != null ? $post->community_id : -1 ,
                'subscribed' => "false",
                'author_photo_path' => User::where('username', $post->author_username)->get()->first()->photo_url,
                'downvotes' => $post->downvotes,
                'upvotes' => $post->upvotes,
                'date' => $post->link_date,
                'comments_num' => $post->comments_num = Link::commentsNum($post->link_id),
                'saved' => "false",
                'hidden' => "false",
                'upvoted' => "false",
                'downvoted' => "false",
                'pinned' => $post->pinned


            ];


            if ($Auth && UpvotedLink::upvoted($post->link_id, auth()->user()->username)) {
                $renamed_posts[$i]->upvoted = 'true';
            } elseif ($Auth && DownvotedLink::downvoted($post->link_id, auth()->user()->username)) {
                $renamed_posts[$i]->downvoted = 'true';
            }

            if ($Auth && SavedLink::isSaved($post->link_id, auth()->user()->username)) {
                $renamed_posts[$i]->saved = "true";
            }

            if ($Auth && HiddenPost::hidden($post->link_id, auth()->user()->username)) {
                $renamed_posts[$i]->hidden = "true";
            }

            if (!is_null($post->community_id)) {
                $community = Community::getCommunity($post->community_id);
                $renamed_posts[$i]->community = $community->name;
                if ($Auth && Subscribtion::subscribed($post->community_id, auth()->user()->username)) {
                    $renamed_posts[$i]->subscribed = "true";
                }
            }

            $i++;
        }

        return response()->json(['posts' => $renamed_posts], 200);
    }












    /**
     *
     * Viewing comments of a user on posts he/she has interacted with.
     * @bodyParam username string required username of the user you wanna see his/her comments on posts.
     * @response 200 {
     *  "0":{"post":{"post_id" : 1 ,"body":"post1" ,"title":"post" ,"author_username" : "ahmed" , "community" :" laravel","community_id":1 },"comments" :[
     *      {"comment_id":55 ,"body":"comment1 on post1" , "date" : "2 days ago"},{"comment_id":59 ,"body":"comment2 on post1" , "date" : "3 days ago"}
     *  ] } ,
     *  "1":{"post":{"post_id" : 7 ,"body":"post2" ,"title":"post" ,"author_username" : "ahmed" , "community" :" laravel","community_id":1 } , "comments":[
     *     {"comment_id":40 ,"body":"comment1 on post2" , "date" : "2 days ago"},{"comment_id":89 ,"body":"comment2 on post2" , "date" : "3 days ago"},{"comment_id":79 ,"body":"comment3 on post2" , "date" : "3 days ago"}
     *  ]},
     *  "2":{"post":{"body":"post1" ,"title":"post" ,"author_username" : "ahmed" , "community" :" laravel","community_id":1 },"commments" : [
     *     {"comment_id":80 ,"body":"comment1 on post3" , "date" : "2 days ago"}
     *  ]}
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username is required"
     * }
     */

    public function ViewComments(Request $request)
    {
        $valid = Validator::make($request->all() , ['username'=>'required']);
        if($valid->Fails())
        {
             return response()->json([
                	"success" => "false",
                	"error" => "username is required"
             ],403);
        }

        $Commentedposts = Link::postsUserCommentedOn($request->username);
        $posts_comments = array();
        $i = 0;
        foreach($Commentedposts as $post)
        {
             $post->community_id = $post->community_id != null ? $post->community_id : -1;
             $post->community = "none";
             if($post->community_id != -1)
             {
                 $post->community = Community::getCommunity($post->community_id)->name;
             }

             $posts_comments[$i]['post'] = $post;
             $posts_comments[$i]['comments'] = Link ::commentsOfPostsByUser($post->post_id ,$request->username );

             $i++;
        }

        return response()->json($posts_comments,200);


    }


    /**
     * Viewing comments of a specific post or replies of a specific comment
     * @bodyParam link_id int required the id of the post or the id of the comment.
     * @response 200 {
     *	"comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" , "author_photo_path" : "storage/app/avater.jpg", "downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed",  "author_photo_path" : "storage/app/avater.jpg","downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false" , "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg", "downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" }]
     * }
     *
     * @response 404 {
     *	"error" :"somethimg wrong!!!!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "this post, comment or reply doesn't exist"
     * }
     */
    public function ViewCommentsAndRepliesOfPostsAndComments()
    {
    }


    /**
     * View the upvoted posts of the user or the downvoted ones
     * @bodyParam type int required it is one for the upvoted posts and zero for the downvoted ones.
     * @authenticated
     * @response 200 {
     *	"posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed","community" : "none" , "community_id" : -1 ,"subscribed" : "true","author_photo_path" : "storage/app/avater.jpg" , "downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
     *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" ,"community" : "none","community_id" : -1,"subscribed" : "false","author_photo_path" : "storage/app/avater.jpg", "downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" } ,
     *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" ,"community" : "laravel" ,"community_id" : 1,"subscribed" : "true" ,"author_photo_path" : "storage/app/avater.jpg","downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false" }]
     * }
     * @response 404 {
     * 	"error" :"somethimg wrong!!!!"
     * }
     * @response 401 {
     * 	"success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "undefined type"
     * }
     */
    public function ViewUpVotedOrDownVotedPosts(Request $request)
    {
        $valid = Validator::make($request->all() , ['type' => 'required']);
        if($valid->Fails())
        {
             return response()->json([

               'success' => 'false',
               'error' => 'type is required'

             ],403);
        }

        if($request->type != 1 && $request->type != 0 )
        {
             return response()->json([

               'success' => 'false',
               'error' => 'type is undefined it must be one for upvoted posts and 0 for downvoted ones'

             ],403);
        }

        $username = auth()->user()->username;
        $posts;
        if($request->type)
        {
            $posts = Link::upvotedPostsByUser($username);
        } else {
            $posts = Link::downvotedPostsByUser($username);
        }

        $renamed_posts = array();

        $i = 0;
        foreach ($posts as $post) {
            $renamed_posts[$i] =(object) [

                'post_id' => $post->link_id,
                'body' => $post->content,
                'video_url' => $post->video_url != null ? $post->video_url : -1 ,
                'image' => $post->content_image != null ? $post->content_image : -1,
                'title' => $post->title,
                'username' => $post->author_username,
                'community' => "none",
                'community_id' => $post->community_id != null ? $post->community_id : -1 ,
                'subscribed' => "false",
                'author_photo_path' => User::where('username', $post->author_username)->get()->first()->photo_url,
                'downvotes' => $post->downvotes,
                'upvotes' => $post->upvotes,
                'date' => $post->link_date,
                'comments_num' => $post->comments_num = Link::commentsNum($post->link_id),
                'saved' => "false",
                'hidden' => "false",
            ];

            if (SavedLink::isSaved($post->link_id, $username)) {
                $renamed_posts[$i]->saved = "true";
            }

            if (HiddenPost::hidden($post->link_id, $username)) {
                $renamed_posts[$i]->hidden = "true";
            }

            if (!is_null($post->community_id)) {
                $community = Community::getCommunity($post->community_id);
                $renamed_posts[$i]->community = $community->name;
                if (Subscribtion::subscribed($post->community_id, $username)) {
                    $renamed_posts[$i]->subscribed = "true";
                }
            }

            $i++;
        }

        return response()->json(['posts' => $renamed_posts],200);

    }



    /**
     * View the overview of the user [Posts, comments, and links].
     * @bodyParam username string required if you visited another user profile this is his username.
     * @authenticated
     * @response 200 {
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "none","subscribed" : "false","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "false", "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "none","subscribed" : "false","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "hidden": "true", "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","title" : "title1","username": "ahmed" , "community" : "laravel","subscribed" : "true","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true", "hidden": "true", "upvoted" : "true" , "downvoted" : "false" }] ,
     *
     * "comments" :[ { "comment_id": 1 , "body" : "comment1" ,"username": "ahmed" ,  "author_photo_path" : "storage/app/avater.jpg","downvotes" : 15, "upvotes" : 0 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "comment_id": 2 , "body" : "comment2" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 23, "upvotes" : 17 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false" , "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "comment_id": 3 , "body" : "comment3" ,"username": "ahmed", "author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 31, "upvotes" : 78 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false"}]
     * }
     * @response 404 {
     * "error" : "something wrong!!!"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username doesn't exist"
     * }
     */
    public function ViewOverview()
    {
    }


    /**
     * Add new Link
     * @bodyParam post_content string required the content written in the post
     * @bodyParam parent_link_id int required the ID of the parent link, this parameter should be 'null' if the link is a post
     * @bodyParam post_title string this parameter is not required only for posts
     * @bodyParam community_id int this parameter is required only if the link is inside a community
     * @bodyParam image_path string if a post contains an image.
     * @bodyParam video_url string  if a post contains a video.
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "post must have a title"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "post must have a content"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "parent doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "community doesn't exist"
     * }
     */
    public function addNewLink()
    {
        // ...
    }


    /**
     *
     * View the saved Links by the user.
     * @authenticated
     *
     * @response 200 {
     * "0":{
     *  "type": "comment",
     *  "post": {
     *      "title": "post1",
     *      "body": "amro post1",
     *      "community_id": -1,
     *      "author_username": "amro"
     *  },
     *  "comments": [
     *      {
     *          "comment_id": 15,
     *          "author_username": "ahmed",
     *          "body": "reply on comment2 on post1",
     *          "link_date": "2019-04-08 00:07:00"
     *      }
     *    ]
     *},
     *"1":{
     *    "body": "amro post2",
     *    "title": "post2",
     *    "upvotes": 0,
     *    "downvotes": 0,
     *    "post_id": 2,
     *    "community_id": 1,
     *    "community": "laravel",
     *    "subscribed": "true",
     *    "upvoted": "false",
     *    "downvoted": "false",
     *    "post_image": "app.storage.koko.jpg",
     *    "video_url": "app.storage.videomp4",
     *    "comments_num": 1,
     *    "hidden": "false",
     *    "type": "post"
     *},
     *"2":{
     *    "body": "ahmed post1",
     *    "title": "post1",
     *    "upvotes": 0,
     *    "downvotes": 0,
     *    "post_id": 4,
     *    "community_id": -1,
     *    "community": "none",
     *    "subscribed": "false",
     *    "upvoted": "false",
     *    "downvoted": "false",
     *    "post_image": -1,
     *    "video_url": -1,
     *    "comments_num": 1,
     *    "hidden": "false",
     *    "type": "post"
     *},
     *"3":{
     * "post": {
     *      "title": "post1",
     *        "body": "ahmed post1",
     *        "community_id": -1,
     *        "author_username": "ahmed"
     *    },
     *        "comments": [
     *        {
     *            "comment_id": 13,
     *            "body": "comment on post4",
     *            "author_username": "amro",
     *            "link_date": "2019-04-08 00:07:00"
     *        },
     *        {
     *
     *            "comment_id": 22,
     *            "author_username": "menna",
     *            "body": "comment on post4",
     *            "link_date": "2019-04-08 00:07:00"
     *        }
     *    ]
     *}
     *}
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */
    public function ViewSavedLinks(Request $request)
    {
         $username = auth()->user()->username;
         $links = Link::savedPostsOrPostsHaveSavedComments($username);
         $links_comments = array();
         $i = 0;
         foreach($links as $link)
         {
             if(!SavedLink::isSaved($link->link_id , $username))
             {
                  $links_comments[$i]['type'] = 'comment';
                  $links_comments[$i]['post']['title']=$link->title;
                  $links_comments[$i]['post']['body']=$link->content;
                  $links_comments[$i]['post']['community_id']=$link->community_id != null ? $link->community_id : -1;
                  $links_comments[$i]['post']['author_username']=$link->author_username;
                  $links_comments[$i]['comments'] = Link ::savedCommentsOfPostByUser($link->link_id ,$username);
             } else {
                  $links_comments[$i]['body'] = $link->content;
                  $links_comments[$i]['title'] = $link->title;
                  $links_comments[$i]['upvotes'] = $link->upvotes;
                  $links_comments[$i]['downvotes'] = $link->downvotes;
                  $links_comments[$i]['post_id'] = $link->link_id;
                  $links_comments[$i]['community_id'] = $link->community_id != null ? $link->community_id :-1 ;
                  $links_comments[$i]['community'] = 'none';
                  $links_comments[$i]['subscribed'] = 'false';
                  $links_comments[$i]['upvoted'] = 'false';
                  $links_comments[$i]['downvoted'] = 'false';
                  $links_comments[$i]['comments_num'] = Link::commentsNum($link->link_id);
                  $links_comments[$i]['hidden'] = 'false';
                  $links_comments[$i]['post_image'] = $link->content_image != null ? $post->content_image : -1;
                  $links_comments[$i]['video_url'] = $link->video_url != null ? $post->video_url : -1  ;
                  if (HiddenPost::hidden($link->link_id, $username)) {
                      $links_comments[$i]['hidden'] = 'true';
                  }
                  if (UpvotedLink::upvoted($link->link_id, $username)) {
                      $links_comments[$i]['upvoted'] = 'true';
                  } elseif (DownvotedLink::downvoted($link->link_id, $username)) {
                      $links_comments[$i]['downvoted'] = 'true';
                  }
                  if($links_comments[$i]['community_id'] != -1)
                  {
                       $community = Community::getCommunity($link->community_id);
                       $links_comments[$i]['community'] = $community->name;
                       if (Subscribtion::subscribed($links_comments[$i]['community_id'], $username)) {
                            $links_comments[$i]['subscribed'] = "true";
                       }
                  }

                  $links_comments[$i]['type'] = 'post';
                  if(Link::isPostHasSavedCommentsByUser($link->link_id , $username))
                  {
                       $i++;
                       $links_comments[$i]['post']['title']=$link->title;
                       $links_comments[$i]['post']['body']=$link->content;
                       $links_comments[$i]['post']['community_id']=$link->community_id != null ? $link->community_id : -1;
                       $links_comments[$i]['post']['author_username']=$link->author_username;
                       $links_comments[$i]['comments'] = Link ::savedCommentsOfPostByUser($link->link_id ,$username);
                  }

             }
             $i++;
         }

         return response()->json($links_comments,200);

    }


    /**
     * Viewing the hidden posts of the user.
     * @authenticated
     *@response 200 {
     * "posts" :[ { "post_id": 1 , "body" : "post1" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" , "community" : "laravel" ,"subscribed" : "true","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 17, "upvotes" : 30 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true",  "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "post_id": 2 , "body" : "post2" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" ,"community" : "none" ,"subscribed" : "false","author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "false", "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "post_id": 3 , "body" : "post3" ,"image":"storage/app/avater.jpg","video_url" : "https://www.youtube.com","title" : "title1","username": "ahmed" ,"community" : "none","subscribed" : "false" ,"author_photo_path" : "storage/app/avater.jpg" ,"downvotes" : 15, "upvotes": 20 , "date":" 2 days ago " , "comments_num" : 0, "saved": "true",  "upvoted" : "true" , "downvoted" : "false" }]
     *}
     * @response 404 {
     *	"error" :"somethimg wrong!!!!"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     */


    public function ViewHiddenPosts()
    {
        //..
    }

    /**
     * Remove post, comment or reply.
     * @bodyParam link_id int required the ID of the link
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "link_id is required"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "The link doesn't exist"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "There is something went wrong!"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "Only the moderator of the community or the author of the link can remove it."
     * }
     */
    public function removeLink(Request $request)
    {
        //token should be parsed to get the user name

        $user = auth()->user();

        if (!$request->has('link_id')) {
            return response()->json([

                'success' => 'false',
                'error' => 'link_id is required'

            ], 403);
        }
        //if the post is not existing
        $result = Link::checkExisting($request->link_id);
        if (!$result) {
            return response()->json([
                'success' => 'false',
                'error' => 'The link doesn\'t exist'
            ], 403);
        }

        $current_user = auth()->user()->username;
        $community_id = Link::getCommunity($request->link_id);
        if (!$community_id) {     //the post isn't in community
          if ($current_user == Link::getAuthor($request->link_id)){
                $result=Link::removeLink($request->link_id);
                if($result){
                    return response()->json([
                        'success' => 'true'
                 ], 200);
                } else {
                    return response()->json([
                        'success' => 'false',
                        'error' => 'There is something went wrong!'
                    ], 403);
                }
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Only the moderator of the community or the author of the link can remove it.'
                ], 403);
            }
        } else {  // the post is in acommunity
            if ((ModerateCommunity::checkExisting($community_id, $current_user))||
            ($current_user == Link::getAuthor($request->link_id))) {
                $result=Link::removeLink($request->link_id);
                if($result){
                    return response()->json([
                        'success' => 'true'
                    ], 200);
                } else {
                    return response()->json([
                        'success' => 'false',
                        'error' => 'There is something went wrong!'
                    ], 403);
                }
            } else {
                return response()->json([
                    'success' => 'false',
                    'error' => 'Only the moderator of the community or the author of the link can remove it.'
                ], 403);
            }
        }

    }

    /**
     *
     * Save Post, Comment or Reply.
     *
     * @bodyParam link_id int required The ID of the post/comment to be saved or unsaved.
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "this post, comment or reply doesn't exist"
     * }
     */
    public function saveLink()
    {
    }


    /**
     *
     * Unsave Post, Comment or Reply
     *
     * @bodyParam link_id int required The ID of the post/comment to be saved or unsaved.
     * @authenticated
     * @response 200 {
     *  "success": "true"
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "this post, comment or reply doesn't exist"
     * }
     */
    public function unsaveLink()
    {
        // ...
    }

    /**
     * Give Karma to a user.
     *
     * @authenticated
     * @bodyParam username string required Username to give to a reward.
     * @response 200 {
     * 	"success": "true"
     * }
     *
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     *
     * @response 403 {
     * 	"success": "false",
     * 	"error": "Already given before"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "username doesn't exist"
     * }
     */
    public function giveReward()
    {
        // ...
    }


    /**
     * Upload an image
     * @authenticated
     * @bodyParam uploaded_image file required Image to upload.
     *
     * @response 200 {
     * 	"success": "true",
     * 	"path": "sotrage/app/avatar.jpg"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "UnAuthorized"
     * }
     *
     * @response 401 {
     * 	"success": "false",
     * 	"error": "Unsupported media type"
     * }
     *
     * @response 400 {
     * 	"success": "false",
     * 	"error": "Cannot upload the image"
     * }
     */
    public function uploadImage()
    {
        // code...
    }

    /**
     * Viewing a single post
     *
     *@bodyParam post_id int required the id of the post.
     *@response 200 {
     *	"post_id": 1 ,
     *  "body" : "post1" ,
     *  "image" : "storage/app/avater.jpg",
     *  "title":"title1",
     *	"username": "ahmed" ,
     *  "community" : "none",
     * 	"photo_path" : "storage/app/avater.jpg",
     *	"downvotes" : 17,
     *	"upvotes" : 30 ,
     *	"date":" 2 days ago " ,
     *	"comments_num" : 0,
     *	"saved": "true",
     *  "hidden": "false" ,
     *	"upvoted" : "false" ,
     *	"downvoted" : "true"
     * }
     *
     * @response 404 {
     *	"error" :"somethimg wrong!!!!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "id doesn't exist"
     * }
     */

    public function viewSinglePost()
    {
        // code ...
    }
}
