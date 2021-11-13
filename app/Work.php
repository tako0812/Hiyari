<?php

namespace App;

use App\Item;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //
    public function get_work_id()
    {
        $ret = work::groupBy('work_id')->orderBy('work_id','asc')->get(['work_id']);
        return $ret;
    }
    public function get_train_id()
    {
        $ret = work::groupBy('train_id')->orderBy('train_id', 'asc')->get(['train_id']);
        return $ret;
    }
    public function get_work_by_train_id($id)
    {
        $train_id = work::where('work_id', $id)->groupBy('train_id')->get(['train_id']);
        return $train_id;
    }
    // public function get_work_by_work_id($id){
    //     $work_id=work::where('work_id',$id)->groupBy('train_id')->get(['work_id']);
    //     return $work_id;
    // }



}
