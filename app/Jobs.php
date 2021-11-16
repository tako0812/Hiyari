<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
 public function get_jobs_name(){
    $ret = $this->get();
    return $ret;
 }

    public function Hiyaris(){
        return $this->hasMany('App\Hiyari');
    }
    public function Users(){
        return $this->hasMany('App\User');
    }
    
    public function get_job_name_by_id($id){
        $ret = $this->where('id', $id)->first();
        return $ret;
    }

}
