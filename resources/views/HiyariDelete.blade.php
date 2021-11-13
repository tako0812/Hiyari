@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    削除するヒヤリハットの確認画面
                    </div>
                    <table class="table">
                        <tr>
                            <td>タイトル</td>
                            <td>{{ $hiyari->title }}</td>
                        </tr>
                        <tr>
                            <td>登録日</td>
                            <td>{{ $hiyari->register }}</td>
                        </tr>
                        <tr>
                            <td>発生日</td>
                            <td>{{ $hiyari->day }}</td>
                        </tr>
                        <tr>
                            <td>発生時刻</td>
                            <td>{{ $hiyari->time }}</td>
                        </tr>
                        <tr>
                            <td>職種</td>
                            <td>{{ $hiyari->jobs->job_name }}</td>
                        </tr>

                        <tr>
                            <td>年齢</td>
                            <td>{{ $hiyari->age->age_name }}</td>
                        </tr>

                        <tr>
                            <td>発生場所</td>
                            <td>{{ $hiyari->place }}</td>
                            </td>
                        </tr>

                        <tr>
                            <td>業務内容</td>
                            <td>{{ $hiyari->operation->operation_name }}</td>
                        </tr>
                    </table>
                    <p>ヒヤリハット内容 </p>
                    <p>{{ $hiyari->text }}</p>
                    <p>処置：{{ $hiyari->measures }}</p>
                </div>
            </div>
        </div>
        <form action='{{ route('hiyari.remove') }}' method='post'>
            {{ csrf_field() }}
            <input type='hidden' name='id' value='{{ $hiyari->id }}'>
            <input type='submit' value='削除を確定する' class="btn btn-primary btn-lg">
        </form>
    </div>
@endsection
