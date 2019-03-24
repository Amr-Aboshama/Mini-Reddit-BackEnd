<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{
    /**
     * function to get a list of the blocked users by a specific user
     *
     * @param   string  $username
     *
     * @return  Array    array containing blocked usernames
     */
    public static function getUsersBlockedByUsername($username)
    {
        return Blocking::where('blocker_username', '=', $username)
          ->select('blocked_username')
          -> pluck('blocked_username');
    }

    /**
     * function to get a list of the users uwho blocked a specific user
     *
     * @param   string  $username the user who is blocked
     *
     * @return  Array    array containing usernames who blocked $username
     */
    public static function getUsersWhoBlockedUsername($username)
    {
        return Blocking::where('blocked_username', '=', $username)
          ->select('blocker_username')
          -> pluck('blocker_username');
    }

    /**
     * function to make a user block another user
     *
     * @param   string  $blocker_username
     *
     * @param   string   $blocked_username
     *
     * @return  object   record of the blocking table
     */
    public static function BlockUser($blocker_username, $blocked_username)
    {
        return Blocking::create([
            'blocker_username' => $blocker_username,
            'blocked_username' => $blocked_username
        ]);
    }

    /**
     * function to check if username1 is blocking another username2 or vice versa
     *
     * @param   string  $username1
     *
     * @param   string  $username1
     *
     * @return  bool true if anyone is blocking the other, false if not
     */
    public static function blockedOrBlocker($username1, $username2)
    {
        $result1 = Blocking::where('blocker_username', $username1)->where('blocked_username', $username2)->exists();
        $result2 = Blocking::where('blocker_username', $username2)->where('blocked_username', $username1)->exists();

        return $result1 || $result2;
    }
}
