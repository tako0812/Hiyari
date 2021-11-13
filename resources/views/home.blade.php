@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ヒヤリハット検索システム</div>
                <div class="card-body">
                    <div class="form-group">
                        <select id="select1a" class="form-control" onChange="location.href='work/'+value;">
                        <option disabled selected value>勤務番号で検索する</option>
                        @foreach($work_id as $work)
                        <option value="{{$work->work_id}}">{{$work->work_id}}</option>
                        @endforeach                        
                        </select>
                        <button type="button" class="btn btn-outline-secondary btn-block mt-2">勤務番号で検索</button>
                        <a href="../hiyari/new" type="button" class="btn btn-outline-secondary btn-block mt-2">新着順で表示</a>
                        <button type="button" class="btn btn-outline-secondary btn-block mt-2">いいね数順で表示</button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">ヒヤリハットの管理</div>
                <div class="card-body">
                    <a href="../hiyari/create" type="button" class="btn btn-outline-secondary btn-block mt-2">ヒヤリハットの投稿</a>
                    <a href="../hiyari/create" type="button" class="btn btn-outline-secondary btn-block mt-2">ヒヤリハットの編集</a>
                    <a href="../hiyari/create" type="button" class="btn btn-outline-secondary btn-block mt-2">ヒヤリハットの削除</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection