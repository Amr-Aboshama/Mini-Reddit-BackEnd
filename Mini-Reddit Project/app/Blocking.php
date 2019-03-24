<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{
  public static function getUsersBlockedByUsername ($username)
  {
      return Blocking::where('blocker_username', '=',  $username )
          ->select('blocked_username')
          -> pluck('blocked_username');
  }

  public static function getUsersWhoBlockedUsername ($username)
  {
     return Blocking::where('blocked_username', '=',  $username )
          ->select('blocker_username')
          -> pluck('blocker_username');
  }

  public static function BlockUser($blocker_username, $blocked_username)
  {
      return Blocking::create([
        'blocker_username' => $blocker_username,
        'blocked_username' => $blocked_username
      ]);
  }
     public static function blockedOrBlocker($username1 , $username2)
     {
          $result1 = Blocking::where('blocker_username', $username1)->where('blocked_username', $username2)->exists();
          $result2 = Blocking::where('blocker_username', $username2)->where('blocked_username', $username1)->exists();
          return $result1||$result2;
     }
}
