<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
      public static function CheckExisting($follower , $followed)
      {
            $result = Following::where('follower_username' , $follower)->where('followed_username' , $followed)->exists();
            return $result;
      }
}
