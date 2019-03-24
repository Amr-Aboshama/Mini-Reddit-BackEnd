<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{

	/**
     * function to check if a user is following another user 
     *
     * @param   string  $follower 
     *
     * @param   string  $followed
     *
     * @return  bool
     */
     public static function CheckExisting($follower , $followed)
     {
        $result = Following::where('follower_username' , $follower)->where('followed_username' , $followed)->exists();
        return $result;
     }

}
