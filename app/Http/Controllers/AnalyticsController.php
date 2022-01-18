<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsController extends Controller
{    
    public function index(){
        $keys = ['1','2','3','4','5'];
        $counts = [10,4,3,2,1];
        return view('chart',compact('keys','counts'));
    }
}
