@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        勤務番号（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="allChart"></canvas>
                    </div>
                    <div class="card-body">
                        <p>これは勤務番号でのヒヤリハットの提出件数をグラフにしたものです。</p>
                        このグラフでは１勤務でのヒヤリハット件数が目立つため、乗務する際にはヒヤリハット内容をよく確認して乗務してください。
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        勤務形態（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="all"></canvas>
                    </div>

                    <div class="card-body">
                        <p>これは勤務形態でのヒヤリハットの提出件数をグラフにしたものです。</p>
                        このグラフでは中継勤務と非番でのヒヤリハット件数が目立ちます。最後まで気を抜かずに乗務しましょう。
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        平日・休日の発生確率の比較（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="chart_week"></canvas>
                    </div>

                    <div class="card-body">
                        <p>１列車当たりの平日、休日のヒヤリハット発生確立をそれぞれ比率で表したものです。</p>
                        平日は変則的な列車が多く、ヒヤリハットが発生しやすい傾向があるようです。
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        午前の発生時刻（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="radar_am"></canvas>
                    </div>
                    <div class="card-body">
                        <p>これは午前の時間帯でのヒヤリハットの提出件数をグラフにしたものです。</p>
                        このグラフでは６時～８時でのヒヤリハット件数が目立ちます。ラッシュ時間における安全運行をお願いします。
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        午後の発生時刻（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="radar_pm"></canvas>
                    </div>
                    <div class="card-body">
                        <p>これは午後の時間帯でのヒヤリハットの提出件数をグラフにしたものです。</p>
                        このグラフでは１３時と２０時でのヒヤリハット件数が目立ちます。特にこの時間には注意をしましょう。
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        年間のヒヤリハット提出件数の推移（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="log"></canvas>
                    </div>
                    <div class="card-body">
                        <p>年別のヒヤリハット提出件数を表示しています。</p>
                        ヒヤリハットの提出件数は年々増加を続けており、ミス防止に役立っています。
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        乗務区ごとの提出件数（デモ版）
                    </div>
                    <div class="content">
                        <canvas id="bar"></canvas>
                    </div>
                    <div class="card-body">
                        <p>これは乗務区ごとのヒヤリハット提出件数の合計です。</p>
                        中部乗務区が最も積極的に取り組んでいます。
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        // スクロール処理
        var allChart = document.getElementById("allChart");
        var all = document.getElementById("all");
        var chart_week = document.getElementById("chart_week");
        var radar_am = document.getElementById("radar_am");
        var radar_pm = document.getElementById("radar_pm");
        var log = document.getElementById("log");
        var bar = document.getElementById("bar");

        //描写済みかのフラグ
        var chartFlag1 = false;
        var chartFlag2 = false;
        var chartFlag3 = false;
        var chartFlag4 = false;
        var chartFlag5 = false;
        var chartFlag6 = false;
        var chartFlag7 = false;

        //スクロールのたびに呼び出されるよ
        var graphAnim = function() {
            var wy = window.pageYOffset;
            var wb = wy + screen.height - 200; // スクリーンの最下部位置を取得
            // wb = wy + window.innerHeight, // ブラウザの最下部位置を取得
            // チャートの位置を取得
            chart_allChart = wy + allChart.getBoundingClientRect().top;
            chart_all = wy + all.getBoundingClientRect().top;
            chart_chart_week = wy + chart_week.getBoundingClientRect().top;
            chart_radar_am = wy + radar_am.getBoundingClientRect().top;
            chart_radar_pm = wy + radar_pm.getBoundingClientRect().top;
            chart_log = wy + log.getBoundingClientRect().top;
            chart_bar = wy + bar.getBoundingClientRect().top;

            // チャートの位置がウィンドウの最下部位置を超えたら起動
            if (wb > chart_allChart && chartFlag1 == false) {
                id = 'allChart';
                labels = @json($keys);
                data = @json($counts);
                make_chart(id, labels, data);

                chartFlag1 = true;
            }
            if (wb > chart_all && chartFlag2 == false) {

                id = 'all';
                labels = ["日勤", "親", "中継", "非番"];
                data = [1, 2, 5, 3];
                make_chart(id, labels, data);
                chartFlag2 = true;
            }
            if (wb > chart_chart_week && chartFlag3 == false) {
                id = 'chart_week';
                labels = ["平日", "休日"];
                data = [70, 30];
                make_chart(id, labels, data);
                chartFlag3 = true;
            }
            if (wb > chart_radar_am && chartFlag4 == false) {
                id = 'radar_am';
                labels = ['0時', '1時', '2時', '3時', '4時', '5時', '6時', '7時', '8時', '9時', '10時', '11時'];
                data = [20, 0, 0, 0, 0, 10, 100, 90, 100, 30, 40, 80];
                make_radar(id, labels, data);
                chartFlag4 = true;
            }
            if (wb > chart_radar_pm && chartFlag5 == false) {
                id = 'radar_pm';
                labels = ['12時', '13時', '14時', '15時', '16時', '17時', '18時', '19時', '20時', '21時', '22時', '23時'];
                data = [15, 100, 70, 50, 30, 10, 10, 40, 100, 30, 40, 80];
                make_radar(id, labels, data);
                chartFlag5 = true;
            }

            if (wb > chart_log && chartFlag6 == false) {
                id = 'log';
                labels = ['2015年', '2016年', '2017年', '2018年', '2019年', '2020年', '2021年'];
                data = [0, 5000, 7000, 9800, 11111, 12000, 15000];
                make_log(id, labels, data);
                chartFlag6 = true;
            }
            if (wb > chart_bar && chartFlag7 == false) {
                id = 'bar';
                labels = ["北海道乗務区", "東北乗務区", "関東乗務区", "中部乗務区", "関西乗務区"];
                data = [10000, 12000, 5000, 32000, 12000];
                make_bar(id, labels, data);
                chartFlag7 = true;
            }
        };

        window.addEventListener('load', graphAnim); // 読み込み時の処理
        window.addEventListener('scroll', graphAnim); // スクロール時の処理
    </script>
@endsection
