<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Link extends Model
{
    protected $fillable = ['content','post_id','link_date','content_image', 'video_url', 'title', 'author_username', 'community_id', 'parent_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * function to increment the upvotes of a specific link.
     *
     * @param int $link_id
     *
     * @return void
     */
    public static function incrementUpvotes($link_id)
    {
        $upvotes = self::where('link_id', $link_id)->get()->first()->upvotes;
        ++$upvotes;
        self::where('link_id', $link_id)->update(['upvotes' => $upvotes]);
    }

    /**
     * function to decrement the upvotes of a specific link.
     *
     * @param int $link_id
     *
     * @return void
     */
    public static function decrementUpvotes($link_id)
    {
        $upvotes = self::where('link_id', $link_id)->get()->first()->upvotes;
        --$upvotes;
        $upvotes = max(0, $upvotes);
        self::where('link_id', $link_id)->update(['upvotes' => $upvotes]);
    }

    /**
     * function to increment the downvotes of a specific link.
     *
     * @param int $link_id
     *
     * @return void
     */
    public static function incrementDownvotes($link_id)
    {
        $downvotes = self::where('link_id', $link_id)->get()->first()->downvotes;
        ++$downvotes;
        self::where('link_id', $link_id)->update(['downvotes' => $downvotes]);
    }

    /**
     * function to decrement the downvotes of a specific link.
     *
     * @param int $link_id
     *
     * @return void
     */
    public static function decrementDownvotes($link_id)
    {
        $downvotes = self::where('link_id', $link_id)->get()->first()->downvotes;
        --$downvotes;
        $downvotes = max(0, $downvotes);
        self::where('link_id', $link_id)->update(['downvotes' => $downvotes]);
    }

    /**
     * scopegetPosts it's a scope type function which returns a query of all posts
     * which i can use to filter these posts with more checks .
     *
     * @return object [ query of selected posts ].
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
     * by the post date.
     *
     * @param string $username the username of our user
     *
     * @return array [ list of home posts ].
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
     * based of the given argument ( it returns all posts if $username is null , if $username is assigned a username of a user, it returns the posts of that user ).
     *
     * @param string $username default is null unless we send a username
     *
     * @return array [ array of objects(posts) ].
     */
    public static function popularPosts($username = null)
    {
        if (null === $username) {
            $posts = DB::select('SELECT * from links where parent_id is null order by upvotes DESC');

            return $posts;
        } else {
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
     * him/her and then order the posts by date before returning them.
     *
     * @param int    $community_id the id of the community that the user wants
     *                             to see its posts
     * @param string $username     the username of the user who wants to see the
     *                             community posts
     *
     * @return array [ list of the required posts ].
     */
    public static function postsOfcommunity($community_id, $username)
    {
        $posts = DB::select("SELECT * from links where( parent_id is null and community_id = '$community_id' and author_username not in(
           select blocker_username from blockings where blocked_username = '$username'
         ) and author_username not in(
           select blocked_username from blockings where blocker_username = '$username'
         ) ) order by link_date DESC ");

        return $posts;
    }

    /**
     * function to return the number of comments on a specific post.
     *
     * @param int $post_id
     *
     * @return int [ number of comments ].
     */
    public static function commentsNum($post_id)
    {
        $result = self::where('parent_id', $post_id)->count();

        return $result;
    }

    /**
     * function to check if a link still exists.
     *
     * @param int $link_id
     *
     * @return bool
     */
    public static function checkExisting($link_id)
    {
        $result = self::where('link_id', $link_id)->exists();

        return $result;
    }

    /**
     * function to check if a link is pinned.
     *
     * @param int $link_id
     *
     * @return bool
     */
    public static function checkPinStatus($link_id)
    {
        //if the post wasn't found
        if (!self::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result = DB::select("SELECT pinned FROM links where link_id='$link_id';");

        return $result[0]->pinned;
    }

    /**
     * function to get the parent of a specific link i.e: get the post of the comment
     * or get the comment of the reply.
     *
     * @param int $link_id
     *
     * @return int [ parent id / and returns -1 if the link is a post ].
     */
    public static function getParent($link_id)
    {
        //if the post wasn't found
        if (!self::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result = DB::select("SELECT parent_id FROM links where link_id='$link_id';");

        return $result[0]->parent_id;
    }

    /**
     * this function toggle the pin status of the post given its id.
     *
     * @param int $link_id the id of the link to be pinned or unpinned
     *
     * @return bool [ false if the post doesn't exist or anything went wrong , true if it toggled the pinned status successfully ].
     */
    public static function togglePinStatus($link_id)
    {
        $pin = self::checkPinStatus($link_id);
        if (-1 == $pin) {
            return false;
        }
        if (!$pin) {
            $result = DB::update("UPDATE links SET pinned=1 where link_id='$link_id';");

            return $result;
        } elseif ($pin) {
            $result = DB::update("UPDATE links SET pinned=0 where link_id='$link_id';");

            return $result;
        }

        return false;
    }

    /**
     * this function gets the community id where the link is published given the id of the link.
     *
     * @param int $link_id the id of the link
     *
     * @return int [ -1 if the link doesn't exist and return the community id if the link exists ].
     */
    public static function getCommunity($link_id)
    {
        //if the post wasn't found
        if (!self::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result = DB::select("SELECT community_id FROM links where link_id='$link_id';");

        return $result[0]->community_id;
    }

    /**
     * this function gets the author's username of a specific link given its id.
     *
     * @param int $link_id the id of the link
     *
     * @return string [ -1 if the link doesn't exists  or the username of the author of the link if the link exists ].
     */
    public static function getAuthor($link_id)
    {
        //if the post wasn't found
        if (!self::checkExisting($link_id)) {
            return -1;
        }
        //is the post was found
        $result = DB::select("SELECT author_username FROM links where link_id='$link_id';");

        return $result[0]->author_username;
    }

    /**
     * this function creates a record into the database relation calles 'links' given the id of the link.
     *
     * @param array $link_data the data of the link to be created
     *
     * @return object [ the created link ].
     */
    public static function storeLink($link_data)
    {
        try {
            return self::create($link_data);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * this function is to remove a specific link from the database relation called 'links' given its id.
     *
     * @param int $link_id the id of the link to be removed
     *
     * @return bool [ true if the deletion succeeded and false if it failed ].
     */
    public static function removeLink($link_id)
    {
        $result = self::where('link_id', $link_id)->delete();

        return $result;
    }

    /**
     * it returns the posts that are upvoted by a user.
     *
     * @param string $username username of the user you want to get his/her uovoted posts .
     *
     * @return array [ an array of object each object is an upvoted post by the user ].
     */
    public static function upvotedPostsByUser($username)
    {
        $posts = DB::Select("SELECT * from links where parent_id is null and link_id in (select U.link_id from upvoted_links as U where U.username = '$username' ) ");

        return $posts;
    }

    /**
     * it returns the posts that are downvoted by a user given his/her username.
     *
     * @param string $username username of the user you want to get his/her downvoted posts .
     *
     * @return array [ an array of objects, each object is a downvoted post by the user ].
     */
    public static function downvotedPostsByUser($username)
    {
        $posts = DB::Select("SELECT * from links where parent_id is null and link_id in (select D.link_id from downvoted_links as D where D.username = '$username' ) ");

        return $posts;
    }

    /**
     * this function returns all the posts which the user commented on or replied on comments of these posts.
     *
     * @param string $username username of the user
     *
     * @return array [ array of object, each object is a post that the user commented on or replied on a comment belongs to that post ].
     */
    public static function postsUserCommentedOn($username)
    {
        $posts = DB::Select("SELECT link_date , content as body , title , link_id as post_id , community_id
           FROM links
           where parent_id is null
           and link_id in (Select l.post_id from links as l where l.author_username = '$username')");

        return $posts;
    }

    /**
     * this function returns all the comments done by a specific user on a specific post.
     *
     * @param int    $link_id  the id of the post of which you wanna get the user's comments .
     * @param string $username the username of the user you would like to get his/her comments on the given post.
     *
     * @return array [ array of objects, each object is a comment of the user on the given post ].
     */
    public static function commentsOfPostsByUser($link_id, $username)
    {
        $links = DB::Select("SELECT upvotes , downvotes , link_id as comment_id , content as body , link_date from links where author_username = '$username' and post_id = '$link_id' order by link_date DESC ");

        return $links;
    }

    /**
     * this function returns all the saved comments by a specific user given his/her username on a specific post given its id.
     *
     * @param int    $link_id  the id of the post of which you wanna get the saved comments by the user.
     * @param string $username the username of the user you would like to get the comments saved by him/her of this post.
     *
     * @return array [ array of objects, each object is a comment of the given post saved by the user ].
     */
    public static function savedCommentsOfPostByUser($link_id, $username)
    {
        $links = DB::Select("SELECT upvotes , downvotes , author_username , link_id as comment_id , content as body , link_date from links where post_id = '$link_id' and link_id in (
          select s.link_id from saved_links as s where s.username = '$username'
        ) order by link_date DESC ");

        return $links;
    }

    /**
     * this function returns the saved posts by the given user or the posts that have comments or replies saved by that user.
     *
     * @param string $username the username of the user
     *
     * @return array [ array of objects, each object is a post saved by the user or have comments or replies saved by that user ].
     */
    public static function savedPostsOrPostsHaveSavedComments($username)
    {
        $links = DB::Select("SELECT * from links where parent_id is null and
          ( link_id in (select s.link_id from saved_links as s where s.username = '$username') or link_id in (
            select l.post_id from links as l where l.link_id in (select ss.link_id from saved_links as ss where ss.username = '$username')
          )) order by link_date DESC  ");

        return $links;
    }

    /**
     * function to return all the posts by the given user or the posts which have comments by the given user.
     *
     * @param string $username [description]
     *
     * @return array [description]
     */
    public static function postsOrpostsHaveComments($username)
    {
        $links = DB::Select("SELECT * from links as a where a.parent_id is null and ( a.author_username = '$username'  or  '$username' in (
          select l.author_username from links as l where l.post_id = a.link_id
        )) order by a.link_date DESC");

        return $links;
    }

    /**
     * function to check if the guven post belongs to the given user.
     *
     * @param string $username [description]
     * @param int    $link_id  [description]
     *
     * @return bool [ true if belongs , false if not ].
     */
    public static function isPostByUser($username, $link_id)
    {
        $result = self::where('author_username', $username)->where('link_id', $link_id)->exists();

        return $result;
    }

    /**
     * function to get the comments by the given user on the given post.
     *
     * @param int    $link_id  [description]
     * @param string $username [description]
     *
     * @return array [description]
     */
    public static function commentsOfPostByUser($link_id, $username)
    {
        $links = DB::Select("SELECT upvotes , downvotes , author_username , link_id as comment_id , content as body , link_date from links where post_id = '$link_id' and author_username = '$username' order by link_date DESC");

        return $links;
    }

    /**
     * function to check if the given post has comments by the given user.
     *
     * @param int    $link_id  [description]
     * @param string $username [description]
     *
     * @return bool [ true if the post has comments by the user , false if not ].
     */
    public static function ispostHasCommentsByUser($link_id, $username)
    {
        $links = DB::Select("SELECT exists(select * from links where post_id = '$link_id' and author_username = '$username' ) as result ");

        return $links[0]->result;
    }

    /**
     * this function checks if the given post has comments or replies which are saved by the given user .
     *
     * @param int    $link_id  the id of the post
     * @param string $username the username of the user
     *
     * @return bool [ true if the post has comments or replies saved by the given user,false if not ] .
     */
    public static function isPostHasSavedCommentsByUser($link_id, $username)
    {
        $links = DB::Select("SELECT exists(select * from links where post_id = '$link_id' and link_id in (
          select s.link_id from saved_links as s where s.username = '$username'
        ) ) as result ");

        return $links[0]->result;
    }

    /**
     * check if the give id is the id of a comment by the given user.
     *
     * @param int    $link_id  the id of the comments or the reply.
     * @param string $username the username of the user
     *
     * @return bool [ true if it's a comment or a reply bu the user , false if not. ]
     */
    public static function isCommentByUser($link_id, $username)
    {
        $result = DB::Select("SELECT exists( select * from links where author_username = '$username' and parent_id is not null and link_id = '$link_id'  ) as result");

        return $result[0]->result;
    }

    /**
     * check if the given comment or reply ($comment_id) belongs to the given post ($link_id).
     *
     * @param int $comment_id the id of the comment or the reply.
     * @param int $link_id    the id of the post
     *
     * @return bool [ true if it's a comment or reply on the given post ,false if not ].
     */
    public static function isCommentOrReplyOfPost($comment_id, $link_id)
    {
        $result = DB::Select("SELECT exists( select * from links where link_id = '$comment_id' and post_id = '$link_id' ) as result");

        return $result[0]->result;
    }

    /**
     * function to get all the comments of a post or all replies of a comment.
     *
     * @param int $link_id [description]
     *
     * @return array [description]
     */
    public static function linksOfLink($link_id)
    {
        $links = self::where('parent_id', $link_id)->select('content', 'author_username', 'link_date', 'link_id', 'upvotes', 'downvotes')->orderBy('link_date', 'DESC')->get();

        return $links;
    }

    /**
     * function to get the attribute called post_id for a specific link given the link_id.
     *
     * @param int $link_id the id of the link i need to know its post_id
     *
     * @return int returns the post_id of the link
     */
    public static function getPostID($link_id)
    {
        $result = DB::select("SELECT post_id FROM links where link_id='$link_id';");

        return $result[0]->post_id;
    }

    public static function getComment($comment_id)
    {
        $comment = self::where('link_id', $comment_id)->get()->first();

        return $comment;
    }

    public static function Duration($link_date)
    {
        $start = Carbon::parse($link_date);
        $end = Carbon::parse(date('Y-m-d H:i:s'));
        $minutes = $end->diffInMinutes($start);
        $hours = $minutes / 60;
        $minutes = $minutes % 60;
        $days = $hours / 24;
        $hours = $hours % 24;
        $years = $days / 365;
        $days = $days % 365;
        $months = $days / 30;
        $days = $days % 30;
        $weeks = $days / 7;
        $days = $days % 7;

        if ($years >= 1) {
            return Carbon::now()->subYears($years)->diffForHumans();
        } elseif ($months >= 1) {
            return  Carbon::now()->subMonths($months)->diffForHumans();
        } elseif ($weeks >= 1) {
            return  Carbon::now()->subWeeks($weeks)->diffForHumans();
        } elseif ($days >= 1) {
            return  Carbon::now()->subDays($days)->diffForHumans();
        } elseif ($hours >= 1) {
            return  Carbon::now()->subHours($hours)->diffForHumans();
        } elseif ($minutes >= 1) {
            return  Carbon::now()->subMinutes($minutes)->diffForHumans();
        } else {
            return  Carbon::now()->subSeconds($end->diffInSeconds($start))->diffForHumans();
        }
    }

    /**
     * this function is to update the attribute called title of
     * a spesific row in the relation called links in the database given the id of that link.
     *
     * @param int    $post_id the id of the post that its title is to be updated
     * @param string $title   the new title to be set for the attribute called title in the database relation called links
     *
     * @return int the number of the updated rows
     */
    public static function updatePostTitle($post_id, $title)
    {
        try {
            return DB::table('links')
            ->where('link_id', $post_id)
            ->update(['title' => $title]);
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * this function is to update the attribute called content of
     * a spesific row in the relation called links in the database given the id of that link.
     *
     * @param int    $link_id the id of the post that its content is to be updated
     * @param string $content the new content to be set for the attribute called content in the database relation called links
     *
     * @return int the number of the updated rows
     */
    public static function updateLinkContent($link_id, $content)
    {
        try {
            return DB::table('links')
            ->where('link_id', $link_id)
            ->update(['content' => $content]);
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * this function is to update the attribute called content_image of
     * a spesific row in the relation called links in the database given the id of that link.
     *
     * @param int    $link_id the id of the post that its content_image is to be updated
     * @param string $image   the path of the new image
     *
     * @return int the number of the updated rows
     */
    public static function updatePostImage($link_id, $image)
    {
        try {
            return DB::table('links')
            ->where('link_id', $link_id)
            ->update(['content_image' => $image]);
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * this function is to update the attribute called video_url of
     * a spesific row in the relation called links in the database given the id of that link.
     *
     * @param int    $link_id the id of the post that its video_url is to be updated
     * @param string $url     the url of the new video_url
     *
     * @return int the number of the updated rows
     */
    public static function updatePostVideo($link_id, $url)
    {
        try {
            return DB::table('links')
            ->where('link_id', $link_id)
            ->update(['video_url' => $url]);
        } catch (\Exception $e) {
            return 0;
        }
    }
}
