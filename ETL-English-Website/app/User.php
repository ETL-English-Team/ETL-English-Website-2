<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    protected $table = 'user';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    public static function getUserByUsername($username){
        $data = DB::table('user')
                ->where('username','=',$username)
                ->first();
        
        return $data;
    }

    public static function getUserLevelByUsername($username){
        $data = DB::table('user')
                ->join('currently_level','currently_level.user_id','=','user.user_id')
                ->where('username','=',$username)
                ->select('currently_level')
                ->first();
        
        return $data;
    }

    public static function checkUsernameExistsOrNot($username){
        $data = DB::table('user')->where('username','=',$username)->count('username');
        return $data;
    }

    public static function insertUserAccount($username, $password, $email, $avatar){
        $data = DB::table('user')->insert(['username'=>$username,
                                            'password'=>$password,
                                            'email'=>$email,
                                            'avatar'=>$avatar,
                                            'admin'=>0]);
    }

    public static function getAdminList(){
        $data = DB::table('user')
                    ->where('admin','=',1)
                    ->get();

        return $data;
    }

    public static function getUserList(){
        $data = DB::table('user')
                    ->where('admin','=',0)
                    ->get();

        return $data;
    }

    public static function getNumOfUser(){
        $data = DB::table('user')
                ->where('admin','=',0)
                ->count();

        return $data;
    }
}
