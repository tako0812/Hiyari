<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    // //
    // public function user()
    // {   //usersテーブルとのリレーションを定義するuserメソッド
    //     return $this->belongsTo(User::class);
    // }

    // public function hiyari()
    // {   //reviewsテーブルとのリレーションを定義するreviewメソッド
    //     return $this->belongsTo(Hiyari::class);
    // }
    // public function LikeCount($id){
    //     $ret = $this->where('hiyari_id', $id)->get();
    //     return $ret->count();
    // }
    // public function LikeCountAll()
    // {
    //     $ret = $this->get();
    //     return $ret;
    // }

}
