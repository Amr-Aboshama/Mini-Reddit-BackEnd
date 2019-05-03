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
use App\Following;
use App\Subscribtion;
use App\ModerateCommunity;
use App\PushNotification;
use Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

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
            $result = HiddenPost::hidden($request->post_id, $user->username);
            if ($result) {
                return response()->json([
                    'success' => 'false',
                    'error' => 'already hidden'
                ], 403);
            } else {
                $result = HiddenPost::hidePost($request->post_id, $user->username);
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
                $result = HiddenPost::unhidePost($request->post_id, $user->username);
                if ($result) {  //if the post undidden successfully
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
        }
    }



    /**
     * Edit a post
     * @bodyParam post_id integer required the id of the post that the user wants to edit
     * @bodyParam new_title string the new title of the post
     * @bodyParam new_content string the new content of the post
     * @bodyParam new_image string the directory of the new image if there is .
     * @bodyParam new_video_url string the url of the new video if there is .
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
     * 	"error" : "There are some missing or invalid data!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only the author of the post can edit it"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There are something went wrong!"
     * }
     */


    public function editPost(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'post_id' => [
                'required',
                'numeric'
            ],
            'new_title' => [
                'nullable',
                'max:20',
                'string',
                'min:1'
            ],
            'new_content' => [
                'nullable',
                'max:500',
                'string',
                'min:1'
            ],
            'new_video_url' => [
                'nullable',
                'url'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([

                'success' => 'false',
                'error' => 'There are some missing or invalid data!'

            ], 403);
        }
        // the post doesn't exist
        if(!link::checkExisting($request->post_id)){
            return response()->json([
                'success' => 'false',
                'error' => 'post doesn\'t exist'
            ]);
        }
        //a non-owner user trying to edit the post
        if($user->username != Link::getAuthor($request->post_id)) {
            return response()->json([
                'success' => 'false',
                'error' => 'Only the author of the post can edit it'
            ]);
        }

        if((!$request->has('new_content'))&&(!$request->has('new_title'))&&(!$request->has('new_image'))
        &&(!$request->has('new_video_url'))) {
            return response()->json([

                'success' => 'false',
                'error' => 'There are some missing or invalid data!'

            ], 403);
        }

        if($request->has('new_content')&&(!link::updateLinkContent($request->post_id,$request->new_content))){
            return response()->json([

                'success' => 'false',
                'error' => 'There are something went wrong!'

            ], 403);
        }
        if($request->has('new_title')&&(!link::updatePostTitle($request->post_id,$request->new_title))) {
            return response()->json([

                'success' => 'false',
                'error' => 'There are something went wrong!'

            ], 403);
        }
        if($request->has('new_image')&&(!link::updatePostImage($request->post_id,$request->new_image))) {
            return response()->json([

                'success' => 'false',
                'error' => 'There are something went wrong!'

            ], 403);
        }
        if($request->has('new_video_url')&&(!link::updatePostVideo($request->post_id,$request->new_video_url))) {
            return response()->json([

                'success' => 'false',
                'error' => 'There are something went wrong!'

            ], 403);
        }

        return response()->json([
            'success' => 'true'
        ], 200);
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
     * 	"error" : "comment/reply doesn't exist"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There are some missing or invalid data!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "Only the author of the comment/reply can edit it"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There are something went wrong!"
     * }
     */
    public function editComment(Request $request)
    {
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'comment_id' => [
                'required',
                'numeric'
            ],
            'new_content' => [
                'required',
                'max:500',
                'string',
                'min:1'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json([

                'success' => 'false',
                'error' => 'There are some missing or invalid data!'

            ], 403);
        }
        // the comment doesn't exist
        if(!link::checkExisting($request->comment_id)||(link::getParent($request->comment_id)==null)){
            return response()->json([
                'success' => 'false',
                'error' => 'comment/reply doesn\'t exist'
            ]);
        }

        //a non-owner user trying to edit the comment
        if($user->username != Link::getAuthor($request->comment_id)) {
            return response()->json([
                'success' => 'false',
                'error' => 'Only the author of the comment/reply can edit it'
            ]);
        }

        if($request->has('new_content')&&(!link::updateLinkContent($request->comment_id,$request->new_content))){
            return response()->json([

                'success' => 'false',
                'error' => 'There are something went wrong!'

            ], 403);
        }

        return response()->json([
            'success' => 'true'
        ], 200);
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

                    ], 403);
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

                ], 403);
            } else {
                $posts = Link::getPosts()->where('author_username', auth()->user()->username)->orderBy('link_date', 'DESC')->get();
            }
        }

        $renamed_posts = array();

        $i = 0;
        foreach ($posts as $post) {
            $renamed_posts[$i] = (object)[

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
     *  "0":{"post":{"post_id" : 1 ,"body":"post1" ,"title":"post" ,"author_username" : "ahmed" , "community" :" laravel","community_id":1,"subscribed" : "true" },"comments" :[
     *      {"comment_id":55 ,"body":"comment1 on post1" , "date" : "2 days ago" , "upvotes" : 12 , "downvotes" : 45 , "upvoted" : "true" , "downvoted" : "false"},{"comment_id":59 ,"body":"comment2 on post1" , "date" : "3 days ago" , "upvotes" : 12 , "downvotes" : 45 , "upvoted" : "true" , "downvoted" : "false"}
     *  ] } ,
     *  "1":{"post":{"post_id" : 7 ,"body":"post2" ,"title":"post" ,"author_username" : "ahmed" , "community" :" laravel","community_id":1,"subscribed" : "true" } , "comments":[
     *     {"comment_id":40 ,"body":"comment1 on post2" , "date" : "2 days ago" , "upvotes" : 12 , "downvotes" : 45 , "upvoted" : "true" , "downvoted" : "false"},{"comment_id":89 ,"body":"comment2 on post2" , "date" : "3 days ago" , "upvotes" : 12 , "downvotes" : 45 , "upvoted" : "true" , "downvoted" : "false"},{"comment_id":79 ,"body":"comment3 on post2" , "date" : "3 days ago" , "upvotes" : 12 , "downvotes" : 45 , "upvoted" : "true" , "downvoted" : "false"}
     *  ]},
     *  "2":{"post":{"body":"post1" ,"title":"post" ,"author_username" : "ahmed" , "community" :" laravel","community_id":1,"subscribed" : "true" },"commments" : [
     *     {"comment_id":80 ,"body":"comment1 on post3" , "date" : "2 days ago", "upvotes" : 12 , "downvotes" : 45 , "upvoted" : "true" , "downvoted" : "false"}
     *  ]}
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username is required"
     * }
     */

    public function ViewComments(Request $request)
    {
        $valid = Validator::make($request->all(), ['username' => 'required']);
        if ($valid->Fails()) {
            return response()->json([
                "success" => "false",
                "error" => "username is required"
            ], 403);
        }

        $Commentedposts = Link::postsUserCommentedOn($request->username);
        $posts_comments = array();
        $i = 0;
        foreach ($Commentedposts as $post) {
            $post->community_id = $post->community_id != null ? $post->community_id : -1;
            $post->community = "none";
            $post->subscribed = 'false';

            if ($post->community_id != -1) {
                $post->community = Community::getCommunity($post->community_id)->name;
            }
            try {
                $tokenFetch = JWTAuth::parseToken()->authenticate();
                $username = auth()->user()->username;
                if ($post->community_id != -1 && Subscribtion::subscribed($post->community_id ,$username )) {
                    $post->subscribed = 'true';
                }
            } catch (JWTException $e) {

            }



            $posts_comments[$i]['post'] = $post;
            $posts_comments[$i]['comments'] = Link ::commentsOfPostsByUser($post->post_id, $request->username);

            foreach ($posts_comments[$i]['comments'] as $comments) {
                try {
                    $comments->upvoted = 'false';
                    $comments->downvoted = 'false';
                    $tokenFetch = JWTAuth::parseToken()->authenticate();
                    $username = auth()->user()->username;
                    if (UpvotedLink::upvoted($comments->comment_id, $username)) {
                        $comments->upvoted = 'true';
                    } elseif (DownvotedLink::downvoted($comments->comment_id, $username)) {
                        $comments->downvoted = 'true';
                    }
                } catch (JWTException $e) {
                }
            }

            $i++;
        }

        return response()->json($posts_comments, 200);
    }


    /**
     * Viewing comments of a specific post or replies of a specific comment
     * @bodyParam link_id int required the id of the post or the id of the comment.
     * @response 200 {
     *	"comments" :[ { "link_id": 1 , "content" : "comment1" ,"author_username": "ahmed" , "downvotes" : 15, "upvotes" : 0 , "link_date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "link_id": 2 , "content" : "comment2" ,"author_username": "ahmed","downvotes" : 23, "upvotes" : 17 , "link_date":" 2 days ago " , "comments_num" : 0, "saved": "false" , "upvoted" : "true" , "downvoted" : "false" } ,
     *		{ "link_id": 3 , "content" : "comment3" ,"author_username": "ahmed","downvotes" : 31, "upvotes" : 78 , "link_date":" 2 days ago " , "comments_num" : 0, "saved": "true" , "upvoted" : "true" , "downvoted" : "false" }]
     * }
     *
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "the link_id is required"
     * }
     */
    public function viewCommentsAndRepliesOfPostsAndComments(Request $request)
    {
        $valid = Validator::make($request->all() , ['link_id' => 'required']);
        if($valid->Fails()) {
            return response()->json([
                	'success' => 'false',
                	'error' => 'the link_id is required'
            ],403);
        }

        $links = Link::linksOflink($request->link_id);
        foreach($links as $link) {
            $link->comments_num = Link::commentsNum($link->link_id);
            $link->upvoted = 'false';
            $link->downvoted = 'false';
            $link->saved = 'false';
            try {
                $tokenFetch = JWTAuth::parseToken()->authenticate();
                $username = auth()->user()->username;
                if(UpvotedLink::upvoted($link->link_id , $username)) {
                    $link->upvoted = 'true';
                  } else if (DownvotedLink::downvoted($link->link_id , $username)) {
                    $link->downvoted = 'true';
                  }
                  if(SavedLink::isSaved($link->link_id , $username)) {
                    $link->saved = 'true';
                  }
                } catch (JWTException $e) {

                }
        }

        return response()->json(['comments' => $links],200);

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
        $valid = Validator::make($request->all(), ['type' => 'required']);
        if ($valid->Fails()) {
            return response()->json([

                'success' => 'false',
                'error' => 'type is required'

            ], 403);
        }

        if ($request->type != 1 && $request->type != 0) {
            return response()->json([

                'success' => 'false',
                'error' => 'type is undefined it must be one for upvoted posts and 0 for downvoted ones'

            ], 403);
        }

        $username = auth()->user()->username;
        $posts;
        if ($request->type) {
            $posts = Link::upvotedPostsByUser($username);
        } else {
            $posts = Link::downvotedPostsByUser($username);
        }

        $renamed_posts = array();

        $i = 0;
        foreach ($posts as $post) {
            $renamed_posts[$i] = (object) [

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

        return response()->json(['posts' => $renamed_posts], 200);
    }



    /**
     * View the overview of the user [Posts, comments, and links].
     * @bodyParam username string required if you visited another user profile this is his username.
     * @response 200 {
     * "0":{
     *  "type": "comment",
     *  "post": {
     *      "title": "post1",
     *      "post_id" : 1,
     *      "body": "amro post1",
     *      "community_id": -1,
     *      "author_username": "amro",
     *      "community": "none",
     *      "subscribed": "false"
     *  },
     *  "comments": [
     *      {
     *          "comment_id": 15,
     *          "author_username": "ahmed",
     *          "body": "reply on comment2 on post1",
     *          "link_date": "2019-04-08 00:07:00",
     *          "upvotes" : 20,
     *          "downvotes" : 26,
     *             "upvoted" : "true",
     *             "downvoted" : "false"
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
     *    "saved" : "true",
     *    "type": "post",
     *    "subscribed": "true"
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
     *     "saved" : "true",
     *    "type": "post",
     *      "subscribed": "false"
     *},
     *"3":{
     * "type" : "comment",
     * "post": {
     *      "title": "post1",
     *      "post_id" : 1,
     *        "body": "ahmed post1",
     *        "community_id": -1,
     *        "author_username": "ahmed",
     *        "community": "none",
     *       "subscribed": "false"
     *    },
     *        "comments": [
     *        {
     *            "comment_id": 13,
     *            "body": "comment on post4",
     *            "author_username": "amro",
     *            "link_date": "2019-04-08 00:07:00",
     *            "upvotes" : 20,
     *            "downvotes" : 26,
     *             "upvoted" : "true",
     *             "downvoted" : "false"
     *        },
     *        {
     *
     *            "comment_id": 22,
     *            "author_username": "menna",
     *            "body": "comment on post4",
     *            "link_date": "2019-04-08 00:07:00",
     *            "upvotes" : 20,
     *            "downvotes" : 26,
     *             "upvoted" : "true",
     *             "downvoted" : "false"
     *        }
     *    ]
     *}
     *}
     * @response 404 {
     * "error" : "something wrong!!!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "username is required"
     * }
     */
    public function ViewOverview(Request $request)
    {
        $valid = Validator::make($request->all(), ['username' => 'required']);
        if ($valid->Fails()) {
            return response()->json([
                "success" => "false",
                "error" => "username is required"
              ], 403);
        }

        $username = $request->username;
        $links = Link::postsOrpostsHaveComments($username);
        $links_comments = array();
        $i = 0;
        foreach ($links as $link) {

              if (!Link::isPostByUser( $username , $link->link_id)) {
                  $links_comments[$i]['type'] = 'comment';
                  $links_comments[$i]['post']['title'] = $link->title;
                  $links_comments[$i]['post']['post_id'] = $link->link_id;
                  $links_comments[$i]['post']['body'] = $link->content;
                  $links_comments[$i]['post']['community_id'] = $link->community_id != null ? $link->community_id : -1;
                  $links_comments[$i]['post']['author_username'] = $link->author_username;
                  $links_comments[$i]['post']['community'] = 'none';
                  $links_comments[$i]['post']['subscribed'] = 'false';

                  if($link->community_id != null) {
                      $links_comments[$i]['post']['community'] = Community::getCommunity($link->community_id)->name;
                  }

                  try {

                    $tokenFetch = JWTAuth::parseToken()->authenticate();
                    $username2 = auth()->user()->username;
                    if($link->community_id != null) {
                        if(Subscribtion::subscribed($link->community_id ,$username2 )) {
                            $links_comments[$i]['post']['subscribed'] = 'true';
                        }
                    }

                  } catch (JWTException $e) {

                  }

                  $links_comments[$i]['comments'] = Link ::commentsOfPostByUser($link->link_id, $username);

                  foreach($links_comments[$i]['comments'] as $comment) {

                    try {

                        $comment->upvoted = 'false';
                        $comment->downvoted = 'false';
                        $comment->saved = 'false';

                        $tokenFetch = JWTAuth::parseToken()->authenticate();
                        $username2 = auth()->user()->username;
                        if (UpvotedLink::upvoted($comment->comment_id, $username2)) {
                            $comment->upvoted = 'true';
                        } elseif (DownvotedLink::downvoted($comment->comment_id, $username2)) {
                            $comment->downvoted = 'true';
                        }
                        if(SavedLink::isSaved($comment->comment_id , $username2)) {
                            $comment->saved = 'true';
                        }

                    } catch (JWTException $e) {
                      }
                  }

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
                    $links_comments[$i]['subscribed'] = 'false';
                    $links_comments[$i]['saved'] = 'false';
                    $links_comments[$i]['post_image'] = $link->content_image != null ? $post->content_image : -1;
                    $links_comments[$i]['video_url'] = $link->video_url != null ? $post->video_url : -1  ;
                    $links_comments[$i]['type'] = 'post';
                    if($link->community_id != null) {
                        $links_comments[$i]['community'] = Community::getCommunity($link->community_id)->name;
                    }

                    try {

                        $tokenFetch = JWTAuth::parseToken()->authenticate();
                        $username2 = auth()->user()->username;
                        if (UpvotedLink::upvoted($link->link_id, $username2)) {
                            $links_comments[$i]['upvoted'] = 'true';
                        } elseif (DownvotedLink::downvoted($link->link_id, $username2)) {
                            $links_comments[$i]['downvoted'] = 'true';
                        }

                        if(SavedLink::isSaved($link->link_id , $username2)) {
                            $links_comments[$i]['saved'] = 'true';

                        }

                        if(HiddenPost::hidden($link->link_id , $username2)) {
                            $links_comments[$i]['hidden'] = 'true';
                        }

                        if($link->community_id != null) {
                            if(Subscribtion::subscribed($link->community_id ,$username2 )) {
                                $links_comments[$i]['subscribed'] = 'true';
                            }
                        }
                    } catch (JWTException $e) {
                      }

                if (Link::ispostHasCommentsByUser($link->link_id, $username)) {
                      $i++;
                      $links_comments[$i]['post']['title'] = $link->title;
                      $links_comments[$i]['post']['post_id'] = $link->link_id;
                      $links_comments[$i]['post']['body'] = $link->content;
                      $links_comments[$i]['post']['community_id'] = $link->community_id != null ? $link->community_id : -1;
                      $links_comments[$i]['post']['author_username'] = $link->author_username;
                      $links_comments[$i]['post']['community'] = 'none';
                      $links_comments[$i]['post']['subscribed'] = 'false';

                      if($link->community_id != null) {
                          $links_comments[$i]['post']['community'] = Community::getCommunity($link->community_id)->name;
                      }

                      try {

                        $tokenFetch = JWTAuth::parseToken()->authenticate();
                        $username2 = auth()->user()->username;
                        if($link->community_id != null) {
                            if(Subscribtion::subscribed($link->community_id ,$username2 )) {
                                $links_comments[$i]['post']['subscribed'] = 'true';
                            }
                        }

                      } catch (JWTException $e) {

                      }



                      $links_comments[$i]['comments'] = Link ::commentsOfPostByUser($link->link_id, $username);

                      foreach($links_comments[$i]['comments'] as $comment) {

                        try {
                          $comment->upvoted = 'false';
                          $comment->downvoted = 'false';
                          $comment->saved = 'false';

                          $tokenFetch = JWTAuth::parseToken()->authenticate();
                          $username2 = auth()->user()->username;
                          if (UpvotedLink::upvoted($comment->comment_id, $username2)) {
                              $comment->upvoted = 'true';
                          } elseif (DownvotedLink::downvoted($comment->comment_id, $username2)) {
                              $comment->downvoted = 'true';
                          }
                          if(SavedLink::isSaved($comment->comment_id , $username2)) {
                              $comment->saved = 'true';
                          }

                        } catch (JWTException $e) {
                          }

                      }


                  }
               }

              $i++;

          }

          return response()->json($links_comments,200);
      }


    /**
     * Add new Link
     * @bodyParam post_content string required the content written in the post
     * @bodyParam parent_link_id int the ID of the parent link, this parameter is required only if the link isn't a post
     * @bodyParam post_title string this parameter is required only for posts
     * @bodyParam community_id int this parameter is required only if the link is inside a community
     * @bodyParam image_path string if a post contains an image.
     * @bodyParam video_url string  if a post contains a video.
     * @authenticated
     * @response 200 {
     *  "success": "true",
     *  "link_id" :  3
     * }
     * @response 401 {
     *  "success": "false",
     *  "error": "UnAuthorized"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "There are some missing or invalid data!"
     * }
     * @response 403 {
     *  "success": "false",
     *  "error": "Only moderators or subscribers can post in the community"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "The post you are replying on isn't in the sent community!"
     * }
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "There is something went wrong!"
     * }
     */
    public function addNewLink(Request $request)
    {
        //token should be parsed to get the user name
        $user = auth()->user();

        $validator = Validator::make($request->all(), [
            'post_content' => [
                'required',
                'max:500',
                'filled',
                'string',
                'min:1'
            ],
            'parent_link_id' => [
                'nullable',
                'exists:links,link_id',
                'numeric'
            ],
            'post_title' => [
                Rule::requiredIf($request->parent_link_id == null),
                'max:20',
                'string',
                'min:1'
            ],
            'community_id' => [
                'nullable',
                'numeric',
                'exists:communities,community_id'
            ],
            'video_url' => [
                'nullable',
                'url'
            ]

        ]);
       if ($validator->fails()) {
        return response()->json([

            'success' => 'false',
            'error' => 'There are some missing or invalid data!'

        ], 403);
       }

       //setting data::
        $p['author_username'] = $user->username;
        $p['content']=$request->post_content;
        $p['parent_id']=$request->parent_link_id;
        $p['title']=$request->post_title;
        $p['community_id']=$request->community_id;
        $p['video_url']=$request->video_url;
        $p['content_image']=$request->image_path;
        $p['link_date']=date('Y-m-d H:i:s');
        if($request->has('parent_link_id')){
            $p['title']=null;
            $p['post_id']=link::getPostID($request->parent_link_id);
            if($request->has('community_id')&&(link::getCommunity($request->parent_link_id)!=$request->community_id)){
                return response()->json([
                    'success' => 'false',
                    'error' => 'The post you are replying on isn\'t in the sent community!'
                ],403);
            }
        }

        if($request->has('community_id')){
            if(!(moderateCommunity::checkExisting($request->community_id,$user->username))
            &&!(Subscribtion::subscribed($request->community_id,$user->username))){
                return response()->json([
                    'success' => 'false',
                    'error' => 'Only moderators or subscribers can post in the community'
                ], 403);
            }
        }

        $res= Link::storeLink($p);
        if(!$res)
        {
            return response()->json([
                'success' => 'false',
                'error' => 'There is something went wrong!'
            ], 403);
        }
        else {
            $NotPost = Validator::Make($request->all() , ['parent_link_id'=>'required']);
            if($NotPost->Fails()) {
                $username = auth()->user()->username;
                $users = Following::getUserFollowers($username ,$username);
                $notification = "your friend '$username' created a new post";
                if($request->has('community_id'))
                {
                    $name = Community::getCommunity($request->community_id)->name;
                    $notification = $notification." in '$name' community ";
                }

                PushNotification::sendNotificationToSpecificUsers($notification , $users);
            }
            else {
              $username = auth()->user()->username;
              $auth_username = Link::getAuthor($request->parent_link_id);
              $post_id=$p['post_id'];
              $same = 0;
              if($username == $auth_username) {
                  $same++;
              }

              if(!$same) {
                  if($request->parent_link_id == $post_id ) {
                      $title = Link::getPosts()->where('link_id' , $request->parent_link_id  )->get()->first()->title;
                      $notification = " '$username' has just commented on your post '$title' ";
                      PushNotification::sendNotificationToSpecificUsers($notification , [$auth_username]);
                  }
                  else {
                      $post_username = Link::getAuthor($post_id);
                      $content = Link::getComment($request->parent_link_id)->content;
                      $title = Link::getPosts()->where('link_id' , $post_id )->get()->first()->title;
                      $notification1 = "'$username' has just replied to your comment '$content' on post '$title'";
                      PushNotification::sendNotificationToSpecificUsers($notification1 , [$auth_username]);
                      $f = 0;
                      if($post_username == $username) {
                          $f++;
                      }

                      if(!$f) {
                          $notification2 = " '$username' has replied to '$auth_username' on your post '$title' ";
                          PushNotification::sendNotificationToSpecificUsers($notification2 , [$post_username]);
                      }
                  }
              }

            }

            return response()->json([
                'success' => 'true',
                'link_id' => $res->id
            ], 200);
        }

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
     *      "post_id" : 1,
     *      "body": "amro post1",
     *      "community_id": 3,
     *      "author_username": "amro",
     *      "community": "gogo",
     *        "subscribed": "true"
     *  },
     *  "comments": [
     *      {
     *          "comment_id": 15,
     *          "author_username": "ahmed",
     *          "body": "reply on comment2 on post1",
     *          "link_date": "2019-04-08 00:07:00",
     *          "upvotes" : 20,
     *          "downvotes" : 26,
     *             "upvoted" : "true",
     *             "downvoted" : "false"
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
     *    "type": "post",
     *      "subscribed": "true"
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
     *    "type": "post",
     *     "subscribed": "false"
     *},
     *"3":{
     * "type" : "comment",
     * "post": {
     *      "title": "post1",
     *      "post_id" : 1,
     *        "body": "ahmed post1",
     *        "community_id": -1,
     *        "author_username": "ahmed",
     *        "community": "none",
     *        "subscribed": "false"
     *    },
     *        "comments": [
     *        {
     *            "comment_id": 13,
     *            "body": "comment on post4",
     *            "author_username": "amro",
     *            "link_date": "2019-04-08 00:07:00",
     *            "upvotes" : 20,
     *            "downvotes" : 26,
     *             "upvoted" : "true",
     *             "downvoted" : "false"
     *        },
     *        {
     *
     *            "comment_id": 22,
     *            "author_username": "menna",
     *            "body": "comment on post4",
     *            "link_date": "2019-04-08 00:07:00",
     *            "upvotes" : 20,
     *            "downvotes" : 26,
     *             "upvoted" : "true",
     *             "downvoted" : "false"
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
        foreach ($links as $link) {

            $link->community = 'none';
            $link->subscribed = 'false';
            if($link->community_id != null) {
                $link->community = Community::getCommunity($link->community_id)->name;
                if(subscribtion::subscribed($link->community_id , auth()->user()->username)) {
                    $link->subscribed = 'true';
                }

            }
            if (!SavedLink::isSaved($link->link_id, $username)) {
                $links_comments[$i]['type'] = 'comment';
                $links_comments[$i]['post']['title'] = $link->title;
                $links_comments[$i]['post']['post_id'] = $link->link_id;
                $links_comments[$i]['post']['body'] = $link->content;
                $links_comments[$i]['post']['community_id'] = $link->community_id != null ? $link->community_id : -1;
                $links_comments[$i]['post']['author_username'] = $link->author_username;
                $links_comments[$i]['post']['community'] = $link->community;
                $links_comments[$i]['post']['subscribed'] = $link->subscribed;
                $links_comments[$i]['comments'] = Link ::savedCommentsOfPostByUser($link->link_id, $username);
                foreach ($links_comments[$i]['comments'] as $comments) {
                    $comments->upvoted = 'false';
                    $comments->downvoted = 'false';
                    if (UpvotedLink::upvoted($comments->comment_id, $username)) {
                        $comments->upvoted = 'true';
                    } elseif (DownvotedLink::downvoted($comments->comment_id, $username)) {
                        $comments->downvoted = 'true';
                    }
                }
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
                if ($links_comments[$i]['community_id'] != -1) {
                    $community = Community::getCommunity($link->community_id);
                    $links_comments[$i]['community'] = $community->name;
                    if (Subscribtion::subscribed($links_comments[$i]['community_id'], $username)) {
                        $links_comments[$i]['subscribed'] = "true";
                    }
                }

                $links_comments[$i]['type'] = 'post';
                if (Link::isPostHasSavedCommentsByUser($link->link_id, $username)) {
                    $i++;
                    $links_comments[$i]['post']['title'] = $link->title;
                    $links_comments[$i]['post']['post_id'] = $link->link_id;
                    $links_comments[$i]['post']['body'] = $link->content;
                    $links_comments[$i]['post']['community_id'] = $link->community_id != null ? $link->community_id : -1;
                    $links_comments[$i]['post']['author_username'] = $link->author_username;
                    $links_comments[$i]['post']['community'] = $link->community;
                    $links_comments[$i]['post']['subscribed'] = $link->subscribed;
                    $links_comments[$i]['comments'] = Link ::savedCommentsOfPostByUser($link->link_id, $username);
                    foreach ($links_comments[$i]['comments'] as $comments) {
                        $comments->upvoted = 'false';
                        $comments->downvoted = 'false';
                        if (UpvotedLink::upvoted($comments->comment_id, $username)) {
                            $comments->upvoted = 'true';
                        } elseif (DownvotedLink::downvoted($comments->comment_id, $username)) {
                            $comments->downvoted = 'true';
                        }
                    }
                }
            }
            $i++;
        }

        return response()->json($links_comments, 200);

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


    public function viewHiddenPosts()
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
            if ($current_user == Link::getAuthor($request->link_id)) {
                $result = Link::removeLink($request->link_id);
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
                    'error' => 'Only the moderator of the community or the author of the link can remove it.'
                ], 403);
            }
        } else {  // the post is in acommunity
            if ((ModerateCommunity::checkExisting($community_id, $current_user)) ||
            ($current_user == Link::getAuthor($request->link_id))) {
                $result = Link::removeLink($request->link_id);
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
     * @response 403 {
     *  "success": "false",
     *  "error": "already saved"
     * }
     */
    public function saveLink(Request $request)
    {
          $user = auth()->user();
          $result = Link::checkExisting($request->link_id);
          if (!$result) {
              return response()->json([
                  'success' => 'false',
                  'error' => 'this post, comment or reply doesn\'t exist'
              ], 403);
          }
          $link_saved=SavedLink::linkSaved($request->link_id, $user->username);
          if($link_saved)
          {
              return response()->json([
                  'success' => 'false',
                  'error' => 'already saved'
              ], 403);
          }
          $save_link=SavedLink::store($user->username, $request->link_id);
          if($save_link)
          {
              return response()->json([
                  'success' => 'true'
              ], 200);
          }
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
     * @response 403 {
     *  "success": "false",
     *  "error": "already unsaved"
     * }
     */
    public function unsaveLink(Request $request)
    {
        $user = auth()->user();
        $result = Link::checkExisting($request->link_id);
        if (!$result) {
            return response()->json([
                'success' => 'false',
                'error' => 'this post, comment or reply doesn\'t exist'
            ], 403);
        }
        $link_saved=SavedLink::linkSaved($request->link_id, $user->username);
        if(!$link_saved)
        {
            return response()->json([
                'success' => 'false',
                'error' => 'already unsaved'
            ], 403);
        }
        $save_link=SavedLink::remove($user->username, $request->link_id);
        if($save_link)
        {
            return response()->json([
                'success' => 'true'
            ], 200);
        }


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
     * @response 403 {
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
     *  "community_id" : -1,
     * 	"author_photo_path" : "storage/app/avater.jpg",
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
     * @response 403 {
     * 	"success" : "false",
     * 	"error" : "post_id is required"
     * }
     */

    public function viewSinglePost(Request $request)
    {
        $valid = Validator::Make($request->all() , ['post_id' => 'required']);
        if($valid->Fails())
        {
            return response()->json([
              "success" => "false",
             	"error" => "post_id is required"
            ],403);
        }
        $auth = 0;
        try {
            $tokenFetch = JWTAuth::parseToken()->authenticate();
            $auth++;
        } catch (JWTException $e) {

        }

        $post =(object) Link::getPosts()->where('link_id' , $request->post_id)->get()->first();
        $post->upvoted = "false";
        $post->downvoted = "false";
        $post->hidden = "false";
        $post->saved = "false";
        $post->community = "none";
        if($auth) {
            $username = auth()->user()->username;
            if(UpvotedLink::upvoted($request->post_id,$username)) {
                $post ->upvoted = "true";
            } else if(DownvotedLink::downvoted($request->post_id,$username)) {
                $post->downvoted = "true";
            }

            if(SavedLink::saved($request->post_id , $username)) {
                $post->saved = "true";
            }
            if(HiddenPost::hidden($request->post_id , $username)) {
                $post->hidden = "true";
            }
        }

        return response()->json([
          "post_id" => $post->link_id,
          "body" => $post->content,
          "image"=> $post->image_content,
          "title"=> $post->title,
          "username"=> $post->author_username,
          "community"=> $post->community_id != null ? Community::getCommunity($post->community_id)->name : -1 ,
          "author_photo_path"=> User::where('username', $post->author_username)->get()->first()->photo_url,
          "downvotes"=> $post->downvotes,
          "upvotes" => $post->upvotes,
          "date" => Link::Duration($post->link_date),
          "comments_num"=>Link::commentsNum($post->link_id) ,
          "saved"=>$post->saved,
          "hidden"=> $post->hidden,
          "upvoted"=> $post->upvoted,
          "downvoted"=> $post->downvoted,
          "pinned" => $post->pinned == 1 ? "true" : "false"
        ],200);

    }
}
