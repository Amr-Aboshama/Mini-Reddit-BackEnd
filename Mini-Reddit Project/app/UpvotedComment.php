<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpvotedComment extends Model
{


    protected $fillable = ['user_name', 'link_id'];
    public $timestamps = false; //so that doesn't expext time columns

    //function to store an upvoted post given the username and post_id

    public static function store($user_name , $comment_id)
    {

      try {

        UpvotedComment::create(['user_name' => $user_name , 'link_id' => $comment_id ]);
        return true;

      } catch (\Exception $e) {

        return false;

      }


    }


    //function to remove an upvoted post given the username and post_id

    public static function remove($user_name , $comment_id)
    {
        $result = UpvotedComment::where('user_name' , $user_name)->where('link_id' , $comment_id)->delete();
        return $result;
    }
}
