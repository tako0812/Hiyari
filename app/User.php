<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password','job_name','jobs_id'
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



    public function get_user_by_id($id)
    {
        $ret = $this->where('user_id', $id)->first();
        return $ret;
    }


    public function Hiyaris(){
        return $this->hasMany('App\Hiyari');
    }
    public function job(){
        return $this->belongsTo('App\Jobs','jobs_id');
    }
    public function nices() {
        return $this->hasMany('App\Nice');
    }
    public function likes()
    {
        return $this->hasMany('App\Like');
    }

}
