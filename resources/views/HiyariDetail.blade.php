@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        ヒヤリハットの詳細確認画面
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>タイトル</td>
                                <td>{{ $ret->title }}</td>
                            </tr>
                            <tr>
                                <td>登録日</td>
                                <td>{{ $ret->register }}</td>
                            </tr>
                            <tr>
                                <td>発生日</td>
                                <td>{{ $ret->day }}</td>
                            </tr>
                            <tr>
                                <td>発生時刻</td>
                                <td>{{ $ret->time }}</td>
                            </tr>
                            <tr>
                                <td>職種</td>
                                <td>{{ $ret->jobs->job_name }}</td>
                            </tr>

                            <tr>
                                <td>年齢</td>
                                <td>{{ $ret->age->age_name }}</td>
                            </tr>

                            <tr>
                                <td>発生場所</td>
                                <td>{{ $ret->place }}</td>
                                </td>
                            </tr>

                            <tr>
                                <td>業務内容</td>
                                <td>{{ $ret->operation->operation_name }}</td>
                            </tr>


                        </table>
                        <p>ヒヤリハット内容 </p>
                        <p>{{ $ret->text }}</p>
                        <p>処置：{{ $ret->measures }}</p>
                                           {{-- <!-- もし$niceがあれば＝ユーザーが「いいね」をしていたら -->
                    @if($nice)
                    <!-- 「いいね」取消用ボタンを表示 -->
                        <a href="{{ route('unnice', $ret->id) }}" class="btn btn-success btn-sm">
                            いいね
                            <!-- 「いいね」の数を表示 -->
                            <span class="badge">
                                {{ $ret->nices->count() }}
                            </span>
                        </a>
                    @else
                    <!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
                        <a href="{{ route('nice', $ret->id) }}" class="btn btn-secondary btn-sm">
                            いいね
                            <!-- 「いいね」の数を表示 -->
                            <span class="badge">
                                {{ $ret->nices->count() }}
                            </span>
                        </a>
                    @endif --}}
                    </div>
                </div>
                                     
 
                <a class="btn" href="{{ route('hiyari.edit', ['id' => $ret->id]) }}">編集する</a>
                <a class="btn" href="{{ route('hiyari.delete', ['id' => $ret->id]) }}">削除する</a>
                <span>


                    </span>

            </div>
        </div>
    </div>
        <!-- head内 -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- body内 -->
        <!-- 参考：$itemにはReviewControllerから渡した投稿のレコード$itemsをforeachで展開してます -->
        @auth
            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
            @if (!$hiyari->isLikedBy(Auth::user()))
                <span class="likes">
                    <i class="fas fa-music like-toggle" data-review-id="{{ $ret->id }}"></i>
                    <span class="like-counter">{{ $ret->likes_count }}</span>
                </span><!-- /.likes -->
            @else
                <span class="likes">
                    <i class="fas fa-music heart like-toggle liked" data-review-id="{{ $ret->id }}"></i>
                    <span class="like-counter">{{ $ret->likes_count }}</span>
                </span><!-- /.likes -->
            @endif
        @endauth
        @guest
            <span class="likes">
                <i class="fas fa-music heart"></i>
                <span class="like-counter">{{ $ret->likes_count }}</span>
            </span><!-- /.likes -->
        @endguest
    
@endsection
