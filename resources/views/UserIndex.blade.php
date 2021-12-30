@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $user->name }}さんの情報</div>


                    <div class="card-body">
                        {{-- あなたの投稿数：
                    あなたの獲得いいね数：
                    ランキング：位 --}}
                        <a href="{{ route('LikeUserRanking') }}" type="button"
                            class="btn btn-outline-secondary btn-block mt-2">ランキングを確認する　＞</a>
                        <a href="{{ route('user.hiyari') }}" type="button"
                            class="btn btn-outline-secondary btn-block mt-2">ヒヤリハット投稿履歴　＞</a>
                        <a href="{{ route('user.profile') }}" type="button"
                            class="btn btn-outline-secondary btn-block mt-2">個人の情報を確認する　＞</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
