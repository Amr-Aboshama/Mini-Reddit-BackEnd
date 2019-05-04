<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HiddenPost extends Model
{
    protected $fillable = ['username', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * function to check if a specific link given its id is hidden by a user or not, given the username of that user.
     *
     * @param int    $link_id
     * @param string $username
     *
     * @return bool [ true for hidden, false for unhidden ]
     */
    public static function hidden($link_id, $username)
    {
        $result = self::where('link_id', $link_id)->where('username', $username)->exists();

        return $result;
    }

    /**
     * function to store a record in the database relation called "hidden_posts" making a specific user hide a specific post.
     *
     * @param int    $post_id  the id of the post to be hidden by the user
     * @param string $username the username of the user about to hide a post
     *
     * @return bool [ true if the the data recorded successfully and false otherwise ]
     */
    public static function hidePost($post_id, $username)
    {
        try {
            self::create(['username' => $username, 'link_id' => $post_id]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * function to delete a record from the database relation called "hidden_posts"
     * making a user who hided a post to unhide it,(given the id of the post and the username of the user).
     *
     * @param int    $post_id  the id of the post to be unhidden by a user
     * @param string $username the username of the user about to unhide a post
     *
     * @return bool [ true if the record has been removed successfully and false otherwise ]
     */
    public static function unhidePost($post_id, $username)
    {
        $result = self::where('username', $username)->where('link_id', $post_id)->delete();

        return $result;
    }
}
