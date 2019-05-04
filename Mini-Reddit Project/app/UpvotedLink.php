<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpvotedLink extends Model
{
    protected $fillable = ['username', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * this function creats a new record into the database relation called 'upvoted_links'.
     *
     * @param   string  $username  the username of the user who presses upvote link
     * @param   int  $post_id   the id of the link to be upvoted by the user
     *
     * @return  boolean             [ true if the creation succeeded and false if it failed ].
     */
    public static function store($username, $link_id)
    {
        try {
            UpvotedLink::create(['username' => $username , 'link_id' => $link_id ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    /**
     * this function is to remove a recored from  the database relation called 'upvoted_links'
     * given the username and post_id.
     *
     * @param   string  $username  the username of the user who upvoted the link
     * @param   int  $post_id   the id of the link to be unupvoted by the user
     *
     * @return  boolean            [  true if the record deleted successfully and false if failed ].
     */
    public static function remove($username, $link_id)
    {
        $result = UpvotedLink::where('username', $username)->where('link_id', $link_id)->delete();

        return $result;
    }


    /**
     * this function checks if a specific user upvoted a specific link.
     *
     * @param   int  $link_id   the id of the link
     * @param   string  $username  the username of the user
     *
     * @return  boolean             [ true if the user upvotes the link and false if not ].
     */
    public static function upvoted($link_id, $username)
    {
        $result = UpvotedLink::where('link_id', $link_id)->where('username', $username)->exists();

        return $result;
    }
}
