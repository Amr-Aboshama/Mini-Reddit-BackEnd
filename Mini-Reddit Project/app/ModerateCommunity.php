<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModerateCommunity extends Model
{
    protected $fillable = ['username','community_id'];
    public $timestamps = false; //so that doesn't expext time columns

    /**
     * this function checks if  a specific user moderate a specific community
     *
     * @param   int  $community_id  the id of the community
     * @param   string  $username      the username of the user
     *
     * @return  boolean                 true if the user moderates the community and false if not
     */
    public static function checkExisting($community_id,$username)
    {
        $result = ModerateCommunity::where('community_id', $community_id)->where('username',$username)->exists();
        return $result;
    }


    /**
     * this function creats a record in the database relation called 'moderate_community'
     *
     * @param   int  $community_id  the id of the community to be moderated by the user
     * @param   string  $username      the username of the moderator
     *
     * @return  boolean                 returns true if the creation succeeded and false if it faild
     */
    public static function store($community_id,$username)
    {
        try {
            ModerateCommunity::create(['username' => $username , 'community_id' => $community_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
