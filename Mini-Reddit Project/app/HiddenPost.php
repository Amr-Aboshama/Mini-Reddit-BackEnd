<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HiddenPost extends Model
{
    protected $fillable = ['username','link_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * function to check if a specific link is hidden by a user or not
     *
     * @param   int $link_id
     *
     * @param   string  $username
     *
     * @return  bool   true for hidden, false for unhidden
     */
    public static function hidden($link_id, $username)
    {
        $result = HiddenPost::where('link_id', $link_id)->where('username', $username)->exists();

        return $result;
    }

    /**
     * function to store a record in the database relation called "hidden_posts" making a specific user hida a specific post
     *
     * @param   int  $post_id   the id of the post to be hidden by the user
     * @param   string  $username  the username of the user about to hide a post
     *
     * @return  boolean             returns true if the the data recorded successfully and false otherwise
     */
    public static function hidePost($post_id, $username)
    {
        try {
            HiddenPost::create(['username' => $username , 'link_id' => $post_id ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * function to delete a record from the database relation called "hidden_posts"
     * making a user who hided a post to unhide it
     *
     * @param   int  $post_id   the id of the post to be unhidden by a user
     * @param   string  $username  the username of the user about to unhide a post
     *
     * @return  boolean             return true if the record has been removed successfully and false otherwise
     */
    public static function unhidePost($post_id, $username)
    {
        $result = HiddenPost::where('username', $username)->where('link_id', $post_id)->delete();

        return $result;
    }
}
