<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{

     

     public static function blockedOrBlocker($username1 , $username2)
     {
          $result1 = Blocking::where('blocker_username', $username1)->where('blocked_username', $username2)->exists();
          $result2 = Blocking::where('blocker_username', $username2)->where('blocked_username', $username1)->exists();
          return $result1||$result2;
     }
}
