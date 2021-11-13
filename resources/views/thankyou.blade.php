@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ヒヤリハットの投稿が完了しました</div>

                <div class="card-body">
                    <p>ヒヤリハットの投稿ありがとうございました。</p>
                    <p>ご投稿いただきましたヒヤリハットについては上席者の確認後に掲載されます。</p>
                    <p>引き続きヒヤリハット活動へのご協力をお願いします。</p>
                    <a href="{{ route('hiyari.create')}}" type="button" class="btn btn-outline-secondary btn-block mt-2">ヒヤリハットの投稿をする＞</a>
                    <a href="{{ route('hiyari.new')}}" type="button" class="btn btn-outline-secondary btn-block mt-2">新着ヒヤリハットの確認をする＞</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection