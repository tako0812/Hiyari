<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    public function get_train_id()
    {
        $ret = train::groupBy('train_id')->orderBy('train_id', 'asc')->get(['train_id']);
        return $ret;
    }
    //
}
