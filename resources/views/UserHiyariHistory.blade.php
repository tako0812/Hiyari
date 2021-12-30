@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>あなたのヒヤリハットの投稿履歴一覧</h3>
            </div>
        </div>
        @foreach ($hiyari as $inside)
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a href="../hiyari/detail/{{ $inside->id }}" class="card text-dark ">
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
                            {{ $inside->text }}
                        </div>
                    </a>
                    @can('admin-higher')　
                        <a class="btn" href="{{ route('hiyari.edit', ['id' => $inside->id]) }}">編集する</a>
                        <a class="btn" href="{{ route('hiyari.delete', ['id' => $inside->id]) }}">削除する</a>
                    @endcan
                </div>
            </div>
        @endforeach
    </div>
@endsection
