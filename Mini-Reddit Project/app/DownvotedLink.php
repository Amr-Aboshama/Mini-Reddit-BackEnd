<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownvotedLink extends Model
{
    protected $fillable = ['username', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * this function creats a new record into the database relation called 'downvoted_links'
     *
     * @param   string  $username  the username of the user who presses downvote link
     * @param   int  $post_id   the id of the link to be downvoted by the user
     *
     * @return  boolean             returns true if the creation succeeded and false if it failed
     */
    public static function store($username, $post_id)
    {
        try {
            DownvotedLink::create(['username' => $username , 'link_id' => $post_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    /**
     * this function is to remove a recored from  the database relation called 'downvoted_links'
     * given the username and post_id
     *
     * @param   string  $username  the username of the user who downvoted the link
     * @param   int  $post_id   the id of the link to be undownvoted by the user
     *
     * @return  boolean             returns true if the record deleted successfully and false if failed
     */
    public static function remove($username, $post_id)
    {
        $result = DownvotedLink::where('username', $username)->where('link_id', $post_id)->delete();
        return $result;
    }


    /**
     * this function checks if a specific user downvoted a specific link
     *
     * @param   int  $link_id   the id of the link
     * @param   string  $username  the username of the user
     *
     * @return  boolean             returns true if the user downvotes the link and false if not
     */
    public static function downvoted($link_id, $username)
    {
        $result = DownvotedLink::where('link_id', $link_id)->where('username', $username)->exists();
        return $result;
    }
}
