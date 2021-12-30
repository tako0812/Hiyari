@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        詳細情報
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td>職員番号</td>
                                <td>{{ $user->user_id }}</td>
                            </tr>
                            <tr>
                                <td>名前</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>職種</td>
                                <td>{{ $user->job->job_name }}</td>
                            </tr>


                        </table>

                    </div>
                    {{-- <a class="btn" href="{{ route('user.edit', ['id' => $user->id]) }}">編集する</a> --}}

                </div>
            </div>
        </div>
    </div>
@endsection
