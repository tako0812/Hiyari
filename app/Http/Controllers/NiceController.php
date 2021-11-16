<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hiyari;
use App\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    //
    public function nice(Hiyari $hiyari, Request $request)
    {
        $nice = new Nice();
        $nice->hiyari_id = $hiyari->id;
        $nice->user_id = Auth::user()->id;
        $nice->save();
        return back();
    }
    public function unnice(Hiyari $hiyari, Request $request)
    {
        $user = Auth::user()->id;
        $nice = Nice::where('hiyari_id', $hiyari->id)->where('user_id', $user)->first();
        $nice->delete();
        return back();
    }
}
