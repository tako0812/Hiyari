<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

//認証されたユーザーのみ許可
Route::middleware(['auth'])->group(function () {
    //---------------------------------ヒヤリハット処理---------------------------------------------------
    //トップ画面。
    Route::get('/home', 'HomeController@index')->name('home');
    //新着順でのヒヤリハット共有画面
    Route::get('/', 'HiyariController@hiyarinew')->name('hiyari.new');
    //いいね数でのヒヤリハット共有画面
    Route::get('/ranking', 'HiyariController@hiyariranking')->name('hiyari.ranking');
    //勤務ベースでのヒヤリハット共有画面
    Route::get('/work/{id}', 'HiyariController@index')->name('work.hiyari.index');
    //ヒヤリハットの詳細表示画面
    Route::get('/hiyari/detail/{id}', 'HiyariController@detail')->name('hiyari.detail');
    // ヒヤリハット新規作成画面
    Route::get('hiyari/create', 'HiyariController@create')->name('hiyari.create');
    // ヒヤリハット編集画面
    Route::get('hiyari/edit/{id}', 'HiyariController@edit')->name('hiyari.edit');
    //ヒヤリハットセクションへの登録処理
    Route::post('hiyari/post', 'HiyariController@post')->name('hiyari.post');
    //ヒヤリハットセクションへの確認画面
    Route::get('hiyari/confirm', 'HiyariController@confirm')->name('hiyari.confirm');
    //ヒヤリハットセクションからの登録処理
    Route::post('hiyari/confirm', "HiyariController@send")->name("hiyari.send");
    //ヒヤリハット登録完了画面
    Route::get('/hiyari/thanks', "HiyariController@complete")->name("hiyari.complete");
    //ヒヤリハット更新処理
    Route::post('hiyari/update/{id}', 'HiyariController@update')->name('hiyari.update');
    //ヒヤリハット削除の確認画面
    Route::get('hiyari/delete/{id}', 'HiyariController@delete')->name('hiyari.delete');
    //ヒヤリハット削除処理
    Route::post('hiyari/remove', 'HiyariController@remove')->name('hiyari.remove');
    //ヒヤリハットユーザーランキング
    Route::get('/hiyari/UserRanking', "HiyariController@LikeUserRanking")->name("LikeUserRanking");


    //---------------------------------ユーザー処理---------------------------------------------------
    //ユーザー情報詳細
    Route::get('/user/profile', 'UserController@profile')->name('user.profile');
    //ユーザーのトップ画面
    Route::get('/user', 'UserController@index')->name('user.index');
    //ユーザーのヒヤリハットの投稿履歴
    Route::get('/Hiyari/History', 'UserController@HiyariHistory')->name('user.hiyari');
    //ユーザーのいいねしたヒヤリハット

    //---------------------------------いいね処理---------------------------------------------------
    Route::post('/like', 'HiyariController@like')->name('hiyari.like');


});
