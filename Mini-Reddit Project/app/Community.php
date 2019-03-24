<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    protected $primaryKey = 'community_id';

    /**
     * return a specific community given its id
     * @param  integer $community_id the id of the community that we want to return
     * its data
     * @return object the community object which given its id
     */
    public static function getCommunity($community_id)
    {
        $result = Community::where('community_id', $community_id)->get()->first();

        return $result;
    }

    /**
     * create community for testing
     * @param  string $communityname the name of the community
     * @return object the community object that just has been created
     */
    public static function createDummyCommunity($communityname)
    {
        return Community::create([
            'name' => $communityname
        ]);
    }

    /**
     * return all the communities that their name contains a specific subname
     * @param  string $comm_name the subname that we search for it
     * @return array  the array of communities that their name contains the
     * subname
     */
    public static function getCommunitiesByName($comm_name)
    {
        return community::where('name', 'like', '%' . $comm_name . '%')
             ->select('name', 'community_id')
             ->where('name', 'like', '%' . $comm_name . '%')
             ->pluck('community_id')->toArray();
    }

    /**
     * check if the community exists in the database or not
     * @param  integer $community_id the community we need to check its existance
     * @return boolean true or false according to the existance of the community
     */
    public static function communityExist($community_id)
    {
        $result = Community::where('community_id', $community_id)->exists();

        return $result;
    }
}
