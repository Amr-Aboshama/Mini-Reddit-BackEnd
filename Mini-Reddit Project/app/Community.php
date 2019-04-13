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
     * @return object  [ the community object which given its id ]
     */
    public static function getCommunity($community_id)
    {
        $result = Community::where('community_id', $community_id)->get()->first();

        return $result;
    }

    /**
     * return a specific community given its name
     * @param  string $community_name the name of the community that we want to return
     * @return object  [ the community object which given its name ]
     */
    public static function getCommunityByName($community_name)
    {
        $result = Community::where("name", $community_name)->get()->first();

        return $result;
    }



    /**
     * create community for testing given its name
     * @param  string $communityname the name of the community
     * @return object  [ the community object that just has been created ]
     */
    public static function createDummyCommunity($communityname)
    {
        return Community::create([
            'name' => $communityname
        ]);
    }

    /**
     * return all the communities that their name contains a specific subname ($comm_name)
     * @param  string $comm_name the subname that we search for it
     * @return array   [ the array of communities that their name contains the subname ]
     */
    public static function getCommunitiesByName($comm_name)
    {
        return community::where('name', 'like', '%' . $comm_name . '%')
             ->select('name', 'community_id')
             ->where('name', 'like', '%' . $comm_name . '%')
             ->pluck('community_id')->toArray();
    }

    /**
     * check if the community exists in the database or not given its id
     * @param  integer $community_id the community we need to check its existance
     * @return boolean  [ true or false according to the existance of the community ]
     */
    public static function communityExist($community_id)
    {
        $result = Community::where('community_id', $community_id)->exists();

        return $result;
    }
    /**
     * check if the name of this community exist in the database given its name
     * @param  string $community_name the name that we want to check its
     * existance
     * @return boolean [ true or false according to the existance of the community ]
     * name
     */
    public static function communityNameExist($community_name)
    {
        $result = Community::where('name', $community_name)->exists();

        return $result;
    }

    /**
     * remove an existing community giving its id
     * @param  int $community_id the id of the community
     * @return boolean [ true or false according to the deletion of the community ]
     */
    public static function removeCommunity($community_id)
    {
        $result = Community::where('community_id', $community_id)->delete();

        return $result;
    }

    /**
     * edit a specific community data given its community_id and its information (content , description , banner and logo)
     * @param  integer $community_id the id of the community
     * @param  text $rules_content  the rules of the community
     * @param  text $description_content the description of the community
     * @param  string $banner  the banner of the communtiy
     * @param  string $logo  community logo
     * @return boolean [ true or false according to the edit success ]
     */
    public static function editCommunity($community_id, $rules_content, $description_content, $banner, $logo)
    {
        $result = Community::where('community_id', $community_id)
      ->update(['rules' => $rules_content,'description' => $description_content,'community_banner' => $banner,'community_logo' => $logo]);

        return $result;
    }

    /**
     * return the maximum community id
     * @return integer  [ the max community_id ]
     */
    public static function getMaxId()
    {
        $max_id = Community::max('community_id');

        return $max_id;
    }
}
