@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8  text-center">
                <h3>注目度ランキング</h3>
            </div>
            <div class="col-md-8 text-center">
                <div class="btn-group w-100 justify-content-center new-ranking" role="group"
                    aria-label="Basic outlined example">
                    <a href="{{ route('hiyari.ranking') }}" type="button"
                        class="btn btn-outline-secondary @if (route('hiyari.ranking') == url()->full()) active @endif">平日</a>
                    <a href="{{ route('hiyari.ranking.holiday') }}" type="button"
                        class="btn btn-outline-secondary @if (route('hiyari.ranking.holiday') == url()->full()) active @endif">休日</a>
                </div>
            </div>
        </div>
        @foreach ($ret as $inside)

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card text-dark card-ichiran">
                        <a href="../hiyari/detail/{{ $inside->id }}" class="text-dark">
                            <div class="card-header">
                                {{ $inside->title }}
                            </div>
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <td>登録日</td>
                                        <td>{{ $inside->register }}</td>
                                    </tr>
                                    <tr>
                                        <td>発生日</td>
                                        <td>{{ $inside->day }}</td>
                                    </tr>
                                    <tr>
                                        <td>発生時刻</td>
                                        <td>{{ $inside->time }}</td>
                                    </tr>
                                    <tr>
                                        <td>職種</td>
                                        <td>{{ $inside->jobs->job_name }}</td>
                                    </tr>
                                    <tr>
                                        <td>発生場所</td>
                                        <td>{{ $inside->place }}</td>
                                        </td>
                                    </tr>
                                </table>
                                {{ Str::limit($inside->text, 300, '...続きを読む') }}
                            </div>
                        </a>

                        <div class="card-footer">
                            @auth

                                <!-- Review.phpに作ったisLikedByメソッドをここで使用 -->
                                @if (!$hiyari->isLikedBy(Auth::user(), $inside->id))
                                    <span class="likes">
                                        <i class="material-icons like-toggle like"
                                            data-review-id="{{ $inside->id }}">いいね！</i>
                                        <span class="like-counter">{{ $inside->likes()->count('hiyari_id') }}</span>

                                    </span><!-- /.likes -->
                                @else
                                    <span class="likes">
                                        <i class="material-icons like-toggle liked like"
                                            data-review-id="{{ $inside->id }}">いいね！</i>
                                        <span class="like-counter">{{ $inside->likes()->count('hiyari_id') }}</span>
                                    </span><!-- /.likes -->
                                @endif
                            @endauth
                            @guest
                                <span class="likes">
                                    <i class="material-icons">いいね！</i>
                                    {{-- <span class="like-counter">{{ $like_count }}</span> --}}
                                </span><!-- /.likes -->

                            @endguest
                        </div>
                    </div>
                    @can('admin-higher')　
                        <a class="btn" href="{{ route('hiyari.edit', ['id' => $inside->id]) }}">編集する</a>
                        <a class="btn" href="{{ route('hiyari.delete', ['id' => $inside->id]) }}">削除する</a>
                    @endcan
                </div>
            </div>

        @endforeach
    </div>
@endsection
