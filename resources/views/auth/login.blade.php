@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('ヒヤリハット') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

 
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="text" class="form-control @error('name') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <!-- <div class="col-md-6">
                            
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> -->


                        <div class="form-group row">
                            @csrf
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <label for="select1a">勤務番号を選択してください</label>
                            <select id="select1a" class="form-control">
                                <option>11</option>
                                <option>12</option>
                            </select>
                        </div> -->



                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button> 

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた方') }}
                                </a>
                                @endif




                            </div>
                        </div>
                        <!-- 
                        </br>
                        <div class="card card-body" style="width: 18rem;">
                            <h5 class="card-title">作業中にヒヤリ</h5>
                            <p class="card-text">いつもの作業中にこんなヒヤリがありました。気を付けてください</p>
                            <a href="#" class="btn btn-primary">詳細</a>
                        </div>
                        </br>
                        <div class="card card-body" style="width: 18rem;">
                            <h5 class="card-title">運搬中にヒヤリ</h5>
                            <p class="card-text">いつもと違う運搬作業をしているときにヒヤリがありました。注意が必要です。</p>
                            <a href="#" class="btn btn-primary">詳細</a>
                        </div>
                        </br>
                        <div class="card card-body" style="width: 18rem;">
                            <h5 class="card-title">出会い頭にヒヤリ</h5>
                            <p class="card-text">車を運転中に出合い頭に事故にあいそうでした。ヒヤリとしたので気を付けてください。</p>
                            <a href="#" class="btn btn-primary">ボタン</a>
                        </div>
                        </br>  -->

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection