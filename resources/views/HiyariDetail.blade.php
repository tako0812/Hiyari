@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{-- <div class="col-md-2 d-none d-lg-block sidebar">
                <ul class="nav flex-column nav-fill　nav-pills">
                    <li class="nav-item">
                        <a class="nav-link  text-dark btn btn-outline-secondary inside-sidebar" href="{{ route('hiyari.new') }}">新着順</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-outline-secondary inside-sidebar" href="{{ route('hiyari.ranking') }}">人気順</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-outline-secondary inside-sidebar" href="{{ route('home') }}">検索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-outline-secondary inside-sidebar" href="{{ route('hiyari.create') }}">投稿</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark btn btn-outline-secondary inside-sidebar" href="{{ route('user.index') }}">ユーザー情報</a>
                    </li>
                </ul>
            </div> --}}
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
                                <td>平日休</td>
                                <td>{{ $ret->weeks->name }}</td>
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
                        <!-- body内 -->
                        <!-- 参考：$itemにはReviewControllerから渡した投稿のレコード$itemsをforeachで展開してます -->
                        @auth
                            <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                            @if (!$hiyari->isLikedBy(Auth::user(), $ret->id))
                                <span class="likes">
                                    <i class="material-icons like-toggle like"
                                        data-review-id="{{ $ret->id }}">いいね！</i>
                                    <span class="like-counter">{{ $like_count }}</span>
                                </span><!-- /.likes -->
                            @else
                                <span class="likes">
                                    <i class="material-icons like-toggle liked like"
                                        data-review-id="{{ $ret->id }}">いいね！</i>
                                    <span class="like-counter">{{ $like_count }}</span>
                                </span><!-- /.likes -->
                            @endif
                        @endauth
                        @guest
                            <span class="likes">
                                <i class="material-icons">いいね！</i>
                                <span class="like-counter">{{ $like_count }}</span>
                            </span><!-- /.likes -->
                        @endguest
                    </div>
                </div>
                @can('admin-higher')　
                    <a class="btn" href="{{ route('hiyari.edit', ['id' => $ret->id]) }}">編集する</a>
                    <a class="btn" href="{{ route('hiyari.delete', ['id' => $ret->id]) }}">削除する</a>
                @endcan
            </div>
        </div>
    </div>
@endsection
