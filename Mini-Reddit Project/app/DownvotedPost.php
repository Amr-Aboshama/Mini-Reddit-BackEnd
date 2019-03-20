<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DownvotedPost extends Model
{
    
    protected $fillable = ['user_name', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns

   // public $incrementing = false; //so eloquent doesn't expect your primary key to be an autoincrement primary key.

    //function to store a downvote post given the username and post_id

    public static function store($user_name , $post_id)
    {

      try {

        DownvotedPost::create(['user_name' => $user_name , 'link_id' => $post_id ]);
        return true;

      } catch (\Exception $e) {

        return false;

      }


    }


    //function to remove an upvoted post given the username and post_id

    public static function remove($user_name , $post_id)
    {
        $result = DownvotedPost::where('user_name' , $user_name)->where('link_id' , $post_id)->delete();
        return $result;
    }

    public static function find($user_name , $post_id)
    {
        $result = DownvotedPost::select('user_name','link_id')->where('user_name' , $user_name)->where('link_id' , $post_id)->get();
        return $result;
    }


}
