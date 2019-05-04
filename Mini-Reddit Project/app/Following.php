<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    protected $fillable = [
        'follower_username', 'followed_username',
    ];

    public $incrementing = false; //so eloquent doesn't expect your primary key to be an autoincrement primary key.

    public $timestamps = false; // To cancel expectations of updated_at and created_at tables.

    /**
     * function to check if a user is following another user given their usernames where the first username belongs to the follower.
     *
     * @param string $follower
     * @param string $followed
     *
     * @return bool [ true if the first user follows the other , false otherwise ]
     */
    public static function CheckExisting($follower, $followed)
    {
        return self::where('follower_username', $follower)
                        ->where('followed_username', $followed)
                        ->exists();
    }

    /**
     * Add a new following relation given both, the username of the follower and the followed user .
     *
     * @param string $follower_username follower
     * @param string $followed_username followed
     *
     * @return bool [ If existing, return false. otherwise, create relation and return true ]
     */
    public static function createFollow($follower_username, $followed_username)
    {
        if (self::CheckExisting($follower_username, $followed_username)) {
            return false;
        }

        self::create([
            'follower_username' => $follower_username,
            'followed_username' => $followed_username,
        ]);

        return true;
    }

    /**
     * Remove an existing following relation given the username of the follower and followed users.
     *
     * @param string $follower_username follower
     * @param string $followed_username followed
     *
     * @return bool [ If not existing, return false. otherwise, delete relation and return true ]
     */
    public static function deleteFollow($follower_username, $followed_username)
    {
        if (!self::CheckExisting($follower_username, $followed_username)) {
            return false;
        }
        self::where('follower_username', $follower_username)
                  ->where('followed_username', $followed_username)
                  ->delete();

        return true;
    }

    /**
     * Get the followers of "username" except the blocked or blocking ones from "the requesting user".
     *
     * @param string $username        username to get his followers
     * @param string $requesting_user username that requests to get the list
     *
     * @return array [ List of users that the username follow ]
     */
    public static function getUserFollowers($username, $requesting_user)
    {
        return self::where('followed_username', $username)
                        ->whereNotIn('follower_username', Blocking::getUsersBlockedByUsername($requesting_user))
                        ->whereNotIn('follower_username', Blocking::getUsersWhoBlockedUsername($requesting_user))
                        ->pluck('follower_username');
    }

    /**
     * Get the followers of "username" except the blocked or blocking ones from "the requesting user".
     *
     * @param string $username        username to get his followings
     * @param string $requesting_user username that requests to get the list
     *
     * @return array [ List of users that follows the username ]
     */
    public static function getUserFollowing($username, $requesting_user)
    {
        return self::where('follower_username', $username)
                        ->whereNotIn('followed_username', Blocking::getUsersBlockedByUsername($requesting_user))
                        ->whereNotIn('followed_username', Blocking::getUsersWhoBlockedUsername($requesting_user))
                        ->pluck('followed_username');
    }
}
