<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Hiyari;
class LikeController extends Controller
{
    //
    public function index(Request $request)
{
    $hiyari = Hiyari::withCount('likes')->orderBy('id', 'desc')->paginate(10);
    $param = [
        'hiyari' => $hiyari,
    ];
    return view('hiyari.index', $param);
}
}
