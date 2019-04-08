<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blocking extends Model
{
    protected $fillable = [
        'blocker_username', 'blocked_username'
    ];

    public $incrementing = false; //so eloquent doesn't expect your primary key to be an autoincrement primary key.

    public $timestamps = false; // To cancel expectations of updated_at and created_at tables.


    /**
     * function to get a list of the blocked users by a specific user
     * @param   string  $username
     * @return  array    array containing blocked usernames
     */
    public static function getUsersBlockedByUsername($username)
    {
        return Blocking::where('blocker_username', '=', $username)
          ->select('blocked_username')
          ->pluck('blocked_username');
    }

    /**
     * function to get a list of the users uwho blocked a specific user
     * @param   string  $username the user who is blocked
     * @return  array    array containing usernames who blocked $username
     */
    public static function getUsersWhoBlockedUsername($username)
    {
        return Blocking::where('blocked_username', '=', $username)
          ->select('blocker_username')
          -> pluck('blocker_username');
    }

    /**
     * function to make a user block other user
     * @param   string  $blocker_username
     * @param   string   $blocked_username
     * @return boolean                   if already blocked return false. otherwise, return true
     */
    public static function blockUser($blocker_username, $blocked_username)
    {
        if (Blocking::checkBlock($blocker_username, $blocked_username)) {
            return false;
        }
        Blocking::create([
            'blocker_username' => $blocker_username,
            'blocked_username' => $blocked_username
        ]);

        return true;
    }

    /**
     * function to make a user unblock other user
     * @param  string $blocker_username
     * @param  string $blocked_username
     * @return boolean                   if already unblocked return false. otherwise, return true
     */
    public static function unblockUser($blocker_username, $blocked_username)
    {
        if (! Blocking::checkBlock($blocker_username, $blocked_username)) {
            return false;
        }
        Blocking::where('blocker_username', $blocker_username)
                ->where('blocked_username', $blocked_username)
                ->delete();

        return true;
    }

    /**
     * Check if a user is blocking other user
     * @param  string $blocker
     * @param  string $blocked
     * @return boolean          if blocker is blocking blocked return true. otherwise, return false
     */
    public static function checkBlock($blocker, $blocked)
    {
        return Blocking::where('blocker_username', $blocker)
      ->where('blocked_username', $blocked)
      ->exists();
    }

    /**
     * function to check if username1 is blocking another username2 or vice versa
     * @param   string  $username1
     * @param   string  $username1
     * @return  bool true if anyone is blocking the other, false if not
     */
    public static function blockedOrBlocker($username1, $username2)
    {
        $result1 = Blocking::checkBlock($username1, $username2);
        $result2 = Blocking::checkBlock($username2, $username1);

        return $result1 || $result2;
    }
}
