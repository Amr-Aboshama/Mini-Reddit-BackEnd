<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subscribtion extends Model
{
    protected $fillable = ['username', 'community_id'];
    public $timestamps = false; //so that doesn't expext time columns
    protected $primaryKey = 'subscribtion_id';

    /**
    * check if a specific user subscribes a specific community or not
    * @param  integer $community_id the id of the community
    * @param  string $username     the username of the user
    * @return boolean  true or false according to the subscribtion
    *
    */
    public static function subscribed($community_id, $username)
    {
        $result = Subscribtion::where('community_id', $community_id)->where('username', $username)->exists();
        return $result;
    }

    /**
    * return list of community id's that a specific user subscribe
    * @param  string $username the user that subscribes the communities that we
    * want to return
    * @return array          the array of community id's wanted to be returned
    */
    public static function subscribed_communities($username)
    {
        $subscribed_communities=DB::select(" select community_id
        	                              from subscribtions
        	                              where (username='$username')");
       return $subscribed_communities;
    }


    /**
     * the user subscribe a specific community
     * @param  string $username the username of the user that wants to subscribe
     * the community
     * @param  integer $community_id the id of the community that the user wants
     * to subscribe
     * @return boolean true or false according to the success subscribtion
     */
    public static function store($username, $community_id)
    {
        try {
            Subscribtion::create(['username' => $username , 'community_id' => $community_id ]);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * the user wants to unsubscribe the community
     * @param  string $username the username of the user that wants to unsubscribe
     * the community
     * @param  integer $community_id the id of the community
     * @return boolean  true if successful unsubscribtion and false if unsunuccessful
     *  unsubscribtion
     */
    public static function remove($username, $community_id)
    {
        $result = Subscribtion::where('username', $username)->where('community_id', $community_id)->delete();
        return $result;
    }

    /**
     * create subscribtion for testing
     * @param  integer $community_id the id of the community
     * @param  string $username the username of the user who wants to subscribe
     * the community
     * @return object  the subscribtion object
     */
    public static function createDummySubscribtion($community_id,$username)
    {
        return Subscribtion::create(['username' => $username , 'community_id' => $community_id ]);
    }
}
