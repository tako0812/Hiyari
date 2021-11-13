@extends('layouts.app')

@section('content')
    @if (isset($ret[0]))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3>{{ $ret[0]->work_id }}勤務のヒヤリハット一覧</h3>
                </div>
            </div>
        </div>

        @foreach ($train_id as $work)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header collapsed" data-toggle="collapse"
                                data-target="#card-collapse-1{{ $work->train_id }}">
                                {{ $work->train_id }}列車

                            </div>
                            <div class="card-wrap collapse" id="card-collapse-1{{ $work->train_id }}">
                                <div class="card-body">
                                    @foreach ($ret as $inside)
                                        @if ($inside->train_id == $work->train_id)

                                            <a href="../hiyari/detail/{{ $inside->id }}"
                                                class="card text-dark ">
                                                <div class="card-header ">
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
                                        @endif

                                    @endforeach

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endforeach


    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h3>この勤務のヒヤリハットはありません</h3>
                </div>
            </div>
        </div>
    @endif
@endsection
