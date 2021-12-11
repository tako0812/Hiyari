@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">勤務番号で検索</div>
                    <div class="card-body">
                        <div class="form-group">
                            <select id="select1a" class="form-control" onChange="location.href='work/'+value;">
                                <option disabled selected value>勤務番号で検索する</option>
                                @foreach ($work_id as $work)
                                    <option value="{{ $work->work_id }}">{{ $work->work_id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">キーワードで検索(未実装)

                    </div>
                    <div class="card-body">
                        <form class="mb-2 mt-4 text-center" method="GET" action="{{ route('hiyari.new') }}">
                            <input class="form-control my-2 mr-5" type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-info my-2" type="submit">検索</button>
                                <button class="btn btn-secondary my-2 ml-5">
                                    <a href="{{ route('hiyari.new') }}" class="text-white">
                                        クリア
                                    </a>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
