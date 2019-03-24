<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['content', 'content_image','video_url','title','author_username','community_id','parent_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * function to increment the upvotes of a specific link
     *
     * @param   int  $link_id
     *
     * @return  void
     */
    public static function incrementUpvotes($link_id)
    {
        $upvotes = Link::where('link_id', $link_id)->get()->first()->upvotes;
        $upvotes++;
        Link::where('link_id', $link_id)->update(['upvotes' => $upvotes ]);
    }


    /**
     * function to decrement the upvotes of a specific link
     *
     * @param   int  $link_id
     *
     * @return  void
     */
    public static function decrementUpvotes($link_id)
    {
        $upvotes = Link::where('link_id', $link_id)->get()->first()->upvotes;
        $upvotes--;
        $upvotes = max(0, $upvotes);
        Link::where('link_id', $link_id)->update(['upvotes' => $upvotes ]);
    }

    /**
     * function to increment the downvotes of a specific link
     *
     * @param   int  $link_id
     *
     * @return  void
     */
    public static function incrementDownvotes($link_id)
    {
        $downvotes = Link::where('link_id', $link_id)->get()->first()->downvotes;
        $downvotes++;
        Link::where('link_id', $link_id)->update(['downvotes' => $downvotes ]);
    }

    /**
     * function to decrement the downvotes of a specific link
     *
     * @param   int  $link_id
     *
     * @return  void
     */
    public static function decrementDownvotes($link_id)
    {
        $downvotes = Link::where('link_id', $link_id)->get()->first()->downvotes;
        $downvotes--;
        $downvotes = max(0, $downvotes);
        Link::where('link_id', $link_id)->update(['downvotes' => $downvotes ]);
    }


    /**
     * scopegetPosts it's a scope type function which returns a query of all posts
     * which i can use to filter these posts with more checks
     *
     * @return  object        query of selected posts
     */
    public static function scopegetPosts($query)
    {
        return $query->where('parent_id', null);
    }

    /**
     * return the posts that should appear in the homepage of the user included
     * the posts of the users that our user follows and of the communities that
     * our user subscribe and excluded the posts of the users that our user
     * blocked them or be blocked by our user and then return the posts ordered
     * by the post date
     *
     * @param  string $username the username of our user
     *
     * @return array list of required posts
     */
    public static function homePosts($username)
    {
        $posts = DB::select("SELECT * FROM links
             where( parent_id is null and ( author_username
             in (select followed_username from followings
               where follower_username = '$username') or community_id
               in(select community_id from subscribtions
                 where username = '$username')) and (
                   ( author_username not in (
                     select blocker_username from blockings where(
                       blocked_username = '$username'
                     )
                   ) ) and (
                     author_username not in (
                       select blocked_username from blockings where blocker_username = '$username'
                     )
                   )
                 ) ) ORDER BY link_date DESC ");

        return $posts;
    }


    /**
     * function to get the posts, either for a specific user or the whole posts
     * based of the given argument
     *
     * @param   string  $username  default is null unless we send a username
     *
     * @return  Array    array of objects(posts)
     */
    public static function popularPosts($username = null )
    {
         if(is_null($username))
         {
              $posts = DB::select("SELECT * from links where parent_id is null order by upvotes DESC");
              return $posts;
         }
         else {
              $posts = DB::select("SELECT * from links where (parent_id is null and author_username not in(
                select blocker_username from blockings where blocked_username = '$username'
              ) and author_username not in (
                select blocked_username from blockings where blocker_username = '$username'
              ) ) order by upvotes DESC");

              return $posts;
         }
    }


    /**
     * return all the posts of a specific community given its id to a specific
     * user but exclude the posts of the users who block our user or blocked by
     * him/her and then order the posts by date before returning them
     * @param  integer $community_id the id of the community that the user wants
     * to see its posts
     * @param  string $username the username of the user who wants to see the
     * community posts
     * @return array list of the required posts
     */
    public static function postsOfcommunity($community_id , $username)
    {
         $posts = DB::select("SELECT * from links where( parent_id is null and community_id = '$community_id' and author_username not in(
           select blocker_username from blockings where blocked_username = '$username'
         ) and author_username not in(
           select blocked_username from blockings where blocker_username = '$username'
         ) ) order by link_date DESC ");
         return $posts;
    }


    /**
     * function to return the number of comments on a specific post
     *
     * @param   int  $post_id
     *
     * @return  int number of comments
     */
    public static function commentsNum($post_id)
    {
        $result = Link::where('parent_id', $post_id)->count();
        return $result;
    }


    /**
     * function to check if a link still exists
     *
     * @param   int  $link_id
     *
     * @return  bool
     */
    public static function checkExisting($link_id)
    {
        $result = Link::where('link_id', $link_id)->exists();
        return $result;
    }


    /**
     * function to check if a link is pinned
     *
     * @param   int  $link_id
     *
     * @return  bool
     */
    public static function checkPinStatus($link_id)
    {
        //if the post wasn't found
        if (!Link::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result=DB::select("SELECT pinned FROM links where link_id='$link_id';");
        return $result[0]->pinned;
    }


    /**
     * function to get the parent of a specific link i.e: get the post of the comment
     * or get the comment of the reply
     *
     * @param   int  $link_id
     *
     * @return  int parent id / and returns -1 if the link is a post
     */
    public static function getParent($link_id)
    {
        //if the post wasn't found
        if (!Link::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result=DB::select("SELECT parent_id FROM links where link_id='$link_id';");
        return $result[0]->parent_id;
    }


    /**
     * this function toggle the pinstatus of the post
     *
     * @param   int  $link_id  the id of the link to be pinned or unpinned
     *
     * @return  boolean            return false if the post doesn't exist or anything went wrong
     * and returns true if it toggled the pinned status successfully
     */
    public static function togglePinStatus($link_id)
    {
        $pin=Link::checkPinStatus($link_id);
        if ($pin==-1) {
            return false;
        }
        if (!$pin) {
            $result=DB::update("UPDATE links SET pinned=1 where link_id='$link_id';");
            return $result;
        } elseif ($pin) {
            $result=DB::update("UPDATE links SET pinned=0 where link_id='$link_id';");
            return $result;
        }
        return false;
    }


    /**
     * this function gets the community id where the link is published
     *
     * @param   int  $link_id  the id of the link
     *
     * @return  int            returns -1 if the link doesn't exist and return the community id if the link exists
     */
    public static function getCommunity($link_id)
    {
        //if the post wasn't found
        if (!Link::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result=DB::select("SELECT community_id FROM links where link_id='$link_id';");
        return $result[0]->community_id;
    }


    /**
     * this function gets the author's username of a specific link
     *
     * @param   int  $link_id  the id of the link
     *
     * @return  string            returns -1 if the link doesn't exists
     * or the username of the author of the link if the link exists
     */
    public static function getAuthor($link_id)
    {
        //if the post wasn't found
        if (!Link::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result=DB::select("SELECT author_username FROM links where link_id='$link_id';");
        return $result[0]->author_username;
    }


    /**
     * this function creates a record into the database relation calles 'links'
     *
     * @param   array  $link_data  the data of the link to be created
     *
     * @return  object              the created link
     */
    public static function storeLink($link_data)
    {
        return  Link::create($link_data);
    }


    /**
     * this function is to remove a specific link from the database relation called 'links'
     *
     * @param   int  $link_id  the id of the link to be removed
     *
     * @return  boolean            returns true if the deletion succeeded and false if it failed
     */
    public static function removeLink($link_id)
    {
        $result = Link::where('link_id', $link_id)->delete();
        return $result;
    }
}
