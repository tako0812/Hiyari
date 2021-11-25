@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <p>登録内容の確認</p>
                    </div>


                    <form method="post" action="{{ route('hiyari.send') }}">
                        @csrf
                        <div class="card-body">
                            <table class="table table-sm">
                                <tr>
                                    <td>タイトル</td>
                                    <td>{{ $input['title'] }}</td>
                                </tr>
                                <tr>
                                    <td>発生日</td>
                                    <td>{{ $input['day'] }}</td>
                                </tr>
                                <tr>
                                    <td>発生時刻</td>
                                    <td>{{ $input['time'] }}</td>
                                </tr>
                                <tr>
                                    <td>職種</td>
                                    <td>{{ $job_name->job_name }}</td>
                                </tr>

                                <tr>
                                    <td>年齢</td>
                                    <td>{{ $age_name->age_name }}</td>
                                </tr>

                                <tr>
                                    <td>発生場所</td>
                                    <td>{{ $input['place'] }}</td>
                                    </td>
                                </tr>

                                <tr>
                                    <td>業務内容</td>
                                    <td>{{ $operation_name->operation_name }}</td>
                                </tr>


                            </table>
                            <p>ヒヤリハット内容 </p>
                            <p>{{ $input['text'] }}</p>
                            <div class="form-group">
                                <button name="back" class="btn btn-outline-secondary btn-block w-100">修正する</button>
                            </div>
                            <div class="form-group">
                                <button class="btn 	btn-primary w-100">確定する</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
