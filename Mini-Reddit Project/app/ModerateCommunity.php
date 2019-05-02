<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModerateCommunity extends Model
{
    protected $fillable = ['username','community_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * this function checks if a specific user given its username moderates a specific community given its id.
     *
     * @param   int  $community_id  the id of the community
     * @param   string  $username      the username of the user
     *
     * @return  boolean                 t[ rue if the user moderates the community and false if not ].
     */
    public static function checkExisting($community_id, $username)
    {
        $result = ModerateCommunity::where('community_id', $community_id)->where('username', $username)->exists();

        return $result;
    }


    /**
     * this function creats a record in the database relation called 'moderate_community' givent the username of the moderator and the community id.
     *
     * @param   int  $community_id  the id of the community to be moderated by the user
     * @param   string  $username      the username of the moderator
     *
     * @return  boolean                [ true if the creation succeeded and false if it faild ].
     */
    public static function store($community_id, $username)
    {
        try {
            ModerateCommunity::create(['username' => $username , 'community_id' => $community_id ]);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * function to remove modirator.
     * @param  string $username
     * @param  int $community_id
     * @return boolean               [true if deleted successfully , false if not].
     */

    public static function remove($username, $community_id)
    {
        $result = ModerateCommunity::where('username', $username)->where('community_id', $community_id)->delete();

        return $result;
    }
}
