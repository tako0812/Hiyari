@extends('layouts.app')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="{{ asset('js/beforeLoad.js') }}"></script>

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="box">
                    <h2>職種別比率</h2>
                    <div class="chart-area">
                    <canvas id="chart01"></canvas>
                    </div>
                    </div>
    
            </div>
        </div>
    </div>
@endsection
