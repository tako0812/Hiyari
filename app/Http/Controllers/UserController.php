<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hiyari;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('UserIndex', compact('user'));
    }

    public function Profile()
    {
        $user = Auth::user();
        return view('UserProfile', compact('user'));
    }
    public function HiyariHistory()
    {
        $user_id = Auth::user()->user_id;
        $hiyari = new Hiyari;
        $hiyari = $hiyari->get_hiyari_by_user_id($user_id);
        return view('UserHiyariHistory',compact('hiyari'));
    }
}
