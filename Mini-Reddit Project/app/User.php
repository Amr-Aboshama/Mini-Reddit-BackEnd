<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

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
        'user_name', 'email', 'password',
    ];

    public $timestamps = false; //so that doesn't expext time columns

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

    protected $primaryKey = 'user_name';

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



    public static function storeUser($user_data)
    {
      //$username, $password, $email, $display_name = null, $about = null, $photo_url = null, $cover_url = null

      $user_data['password'] = bcrypt($user_data['password']);
        return User::create($user_data);
    }

    public static function getUsersByUsername($username)
    {
        return User::where('user_name', 'like', '%' . $username . '%')
            ->select('user_name')
            ->where('user_name', 'like', '%' . $username . '%')
            ->pluck('user_name')->toArray();
    }

    public static function getUserWholeRecord($username)
    {
        return User::where('user_name', '=', $username )->first();
    }

    public static function deleteUserByUsername($username)
    {
        return User::where('user_name', $username)->delete();
    }
    
    public static function userExist($username)
    {
        $result = User::where('user_name' , $username)->exists();
        return $result;

    }


}
