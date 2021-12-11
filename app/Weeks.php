<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weeks extends Model
{
    public function Hiyaris(){
        return $this->hasMany('App\Hiyari');
    }
    public function get_week_name(){
        $ret = $this->get();
        return $ret;
     }
     
     public function get_week_name_by_id($id){
        $ret = $this->where('id', $id)->first();
        return $ret;
    }
}
