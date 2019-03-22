<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownvotedLink extends Model
{
    protected $fillable = ['username', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns


    public static function store($username, $post_id)
    {
        try {
            DownvotedLink::create(['username' => $username , 'link_id' => $post_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    //function to remove an upvoted post given the username and post_id

    public static function remove($username, $post_id)
    {
        $result = DownvotedLink::where('username', $username)->where('link_id', $post_id)->delete();
        return $result;
    }


    public static function downvoted($link_id, $username)
    {
        $result = DownvotedLink::where('link_id', $link_id)->where('username', $username)->exists();
        return $result;
    }
}
