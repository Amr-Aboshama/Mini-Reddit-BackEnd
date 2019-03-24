<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpvotedLink extends Model
{
    protected $fillable = ['username', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns



    public static function store($username, $link_id)
    {
        try {
            UpvotedLink::create(['username' => $username , 'link_id' => $link_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }


    //function to remove an upvoted post given the username and post_id

    public static function remove($username, $link_id)
    {
        $result = UpvotedLink::where('username', $username)->where('link_id', $link_id)->delete();
        return $result;
    }


    public static function upvoted($link_id, $username)
    {
        $result = UpvotedLink::where('link_id', $link_id)->where('username', $username)->exists();
        return $result;
    }
}
