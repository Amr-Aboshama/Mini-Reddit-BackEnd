<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersTokens extends Model
{
    public $timestamps = false; // To cancel expectations of updated_at and created_at tables.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'token', 'expires_at',
    ];

    /**
     * Insert new token of a use.
     *
     * @param array $data username and token of a user
     *
     * @return object if record inserted successfully returns record. otherwise, false.
     */
    public static function insertToken($data)
    {
        try {
            return self::create($data);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Remove a record with a specific token.
     *
     * @param string $token token desired to remove it's record
     *
     * @return bool if record deleted successfully returns true. otherwise, false.
     */
    public static function removeByToken($token)
    {
        try {
            self::where('token', $token)->delete();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Remove records with a specific username.
     *
     * @param string $username username desired to remove it's records
     *
     * @return bool if records deleted successfully returns true. otherwise, false.
     */
    public static function removeByUsername($username)
    {
        try {
            self::where('username', $username)->delete();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Remove records that are invalid before specific time.
     *
     * @param string $date date desired to remove records that are invalid before it
     *
     * @return bool if records deleted successfully returns true. otherwise, false.
     */
    public static function removeByDate($date)
    {
        try {
            self::where('expires_at', $date)->delete();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function getTokensByUsername($username)
    {
        return self::where('username', $username)->pluck('token')->toArray();
    }
}
