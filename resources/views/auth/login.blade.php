@extends('layouts.noicon')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ログイン') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <div class="form-group row">
                                <label for="user_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ユーザー名') }}</label>

                                <div class="col-md-6">
                                    <input id="user_id" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id"
                                        autofocus>

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
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    {{-- <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div> --}}
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ログイン') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('パスワードを忘れた方') }}
                                </a> --}}
                                    @endif




                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">



                <div class="card">
                    <div class="card-header">アップデート情報</div>
                    <div class="card-body">
                        <h4>2022年1月3日　アップデート</h4>
                        <p>・ヒヤリハット新着、人気順画面で「いいね」ができるようにアップデート</p>

                        <h4>2022年1月1日　コード修正</h4>
                        <p>・送信確認画面で「戻る」を選択した場合に、平休情報が自動的に入力されない不具合を修正</p>
                        <h4>
                            2021年12月31日　コード修正 </h4>
                        <p>・iPhoneでブラウザバックした時のボタンの表示不具合修正</p>
                        <p>・スマホ版入力フォームで自動的に拡大される仕様を変更</p>
                        <h4>
                            2021年12月30日　コード修正
                        </h4>
                        <p>・画面の下のメニューが文字として出力される場合がある不具合を修正</p>
                        <p>・bootstrapのコード最適化</p>
                        <h4>
                            2021年12月18日　システム公開
                        </h4>
                        ・システムデプロイ完了
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
