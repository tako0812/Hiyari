@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if ($errors->any())
                    <div class="card-text text-left alert alert-danger">
                        {{-- <ul class="mb-0"> --}}

                        @foreach ($errors->all() as $error)
                            <p class="error">{{ $error }}</p>
                        @endforeach

                        {{-- </ul> --}}
                    </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ヒヤリハット新規入力フォーム</div>

                    <div class="card-body">
                        <form action="{{ route('hiyari.post') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>勤務番号</label>
                                <select class="form-control" name="work_id" required>
                                    <option disabled selected value>勤務番号を選択してください</option>
                                    @foreach ($work_id as $work)
                                        <option value="{{ $work->work_id }}" @if (old('work_id') == $work->work_id) selected  @endif>
                                            {{ $work->work_id }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>列車番号</label>
                                <select class="form-control" name="train_id" required>
                                    <option disabled selected value>列車番号を選択してください</option>
                                    @foreach ($train_id as $train)
                                        <option value="{{ $train->train_id }}" @if (old('train_id') == $train->train_id) selected  @endif>
                                            {{ $train->train_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>発生日</label>
                                <input type="date" class="form-control" name="day" required value="{{ old('day') }}">
                            </div>
                            <div class="form-group">
                                <label>発生時刻</label>
                                <input type="time" class="form-control" name="time" required value="{{ old('time') }}">
                            </div>
                            <div class="form-group">
                                <label>職種</label>
                                <select class="form-control" name="jobs_id" required>
                                    <option disabled selected value>職種選択</option>
                                    @foreach ($job_name as $job)
                                        <option value="{{ $job->id }}" @if (old('jobs_id') == $job->id) selected  @endif>{{ $job->job_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>年齢</label>
                                <select class="form-control" name="age_id" required>
                                    <option disabled selected value>年齢選択</option>
                                    @foreach ($age_name as $age)
                                        <option value="{{ $age->id }}" @if (old('age_id') == $age->id) selected  @endif>
                                            {{ $age->age_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>業務内容</label>
                                <select class="form-control" name="operation_id" required>
                                    <option disabled selected value>業務内容選択</option>
                                    @foreach ($operation_name as $operation)
                                        <option value="{{ $operation->id }}" @if (old('operation_id') == $operation->id) selected  @endif>
                                            {{ $operation->operation_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>発生場所</label>
                                <input class="form-control" type="text" name="place" required
                                    value="{{ old('place') }}">

                            </div>
                            <div class="form-group">
                                <label>ヒヤリハットのタイトル</label>
                                <input class="form-control" type="text" name="title" required
                                    value="{{ old('title') }}">
                            </div>
                            <div class="form-group">
                                <label>ヒヤリハット内容</label>
                                <textarea class="form-control" rows="10" type="text" name="text"
                                    required>{{ old('text') }}</textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn 	btn-primary btn-lg">送信確認画面へ</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    @endsection
