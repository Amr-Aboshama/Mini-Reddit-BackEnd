<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use App\Blocking;

class User extends Authenticatable implements JWTSubject
{
    use  Notifiable;

    public $incrementing = false; //so eloquent doesn't expect your primary key to be an autoincrement primary key.



    public $timestamps = false; // To cancel expectations of updated_at and created_at tables.


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'username';

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    /**
     * takes the data of the user then bcrypt its password then create this user
     * and return it
     * @param  array $user_data the data of the user (name,password,email)
     * @return object the created user object
     */
    public static function storeUser($user_data)
    {
        $user_data['password'] = bcrypt($user_data['password']);
        return User::create($user_data);
    }

    /**
     * return list of users that their name contains a specific subname
     * @param  string $username the subname that we are searching for it
     * @return array  the list of users that their name contains the subname
     */
    public static function getUsersByUsername($username)
    {
        return User::where('username', 'like', '%' . $username . '%')
            ->select('username')
            ->where('username', 'like', '%' . $username . '%')
            ->pluck('username')->toArray();
    }

    /**
     * return the data of a specific user given his/her username
     * @param  string $username the username of the user that we want his/her
     * data
     * @return object  the user object wanted
     */
    public static function getUserWholeRecord($username)
    {
        return User::where('username', '=', $username)->first();
    }

    /**
     * delete specific user from the database
     * @param  string $username the username of the user that wanted to be removed
     * @return boolean true or false according t the deletion of the user object
     */
    public static function deleteUserByUsername($username)
    {
        return User::where('username', $username)->delete();
    }

    /**
     * check if the user exists in the database or not
     * @param  string $username the user we need to check its existance
     * @return boolean true or false according to the existance of the user
     */
    public static function userExist($username)
    {
        $result = User::where('username', $username)->exists();
        return $result;
    }

    /**
     * return all the users except the blocked users and the users be blocked
     * @param  string $currentuser the username of the user  who searches for
     * the other users
     * @param  string $username the subname of the users who the current user 
     * wants to search for them
     * @return array  the list of users who the current user searching for
     */
    public static function getUsersByUsernameExceptblockedOrBlockedBy($currentuser, $username)
    {
        return User::where('username', 'like', '%' . $username . '%')
            ->select('username')
            ->where('username', 'like', '%' . $username . '%')
            ->whereNotIn('username', Blocking::getUsersBlockedByUsername ($currentuser))
            ->whereNotIn('username', Blocking::getUsersWhoBlockedUsername ($currentuser))
            ->pluck('username')->toArray();

    }
}
