<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hiyari extends Model
{
    protected $table = 'hiyari';
    protected $fillable = ['work_id', 'train_id', 'day', 'time', 'jobs_id', 'age_id', 'operation_id', 'place', 'text', 'title','day_of_week'];

    public function get_hiyari_by_work_id($id)
    {
        $ret = $this->where('work_id', $id)->get();
        return $ret;
    }
    public function get_hiyari_by_hiyari_id($id)
    {
        $ret = $this->where('id', $id)->first();
        return $ret;
    }
    public function get_hiyari_by_user_id($user_id)
    {
        $ret = $this->where('user_id', $user_id)->get();
        return $ret;
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }
    //後でViewで使う、いいねされているかを判定するメソッド。
    public function isLikedBy($user, $hiyari): bool
    {
        return Like::where('user_id', $user->user_id)->where('hiyari_id', $hiyari)->first() !== null;
    }


    public function get_hiyari_new()
    {
        $ret = $this->where('day_of_week',"1")->latest()->get();
        return $ret;
    }
    public function get_hiyari_new_holiday()
    {
        $ret = $this->where('day_of_week',"2")->latest()->get();
        return $ret;
    }

    public function jobs()
    {
        return $this->belongsTo('App\Jobs');
    }
    public function age()
    {
        return $this->belongsTo('App\Age');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function operation()
    {
        return $this->belongsTo('App\Operation');
    }
    public function nices()
    {
        return $this->hasMany('App\Nice');
    }
    public function weeks()
    {
        return $this->belongsTo('App\Weeks','day_of_week','id');
    }
}
