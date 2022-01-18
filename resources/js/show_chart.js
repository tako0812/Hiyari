import 'chart.js';


//円グラフ
window.make_chart = function make_chart(id, labels, data) {
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: '学生居場所割合',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {}
    });
};


//レーザーチャート
window.make_radar = function make_radar(id, labels, data) {
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: labels,
            datasets: [{
                label: 'ヒヤリハット',
                data: data,
                // データライン
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                //枠線の色
                borderColor: 'rgba(54, 162, 235, 1)',
                // //結合点の背景色
                // pointBackgroundColor: "rgba(200,112,126,1)",
                // //結合点の枠線の色
                // pointBorderColor: "#fff",
                // //結合点の背景色（ホバ時）
                // pointHoverBackgroundColor: "#fff",
                // //結合点の枠線の色（ホバー時）
                // pointHoverBorderColor: "rgba(200,112,126,1)",
                // //結合点より外でマウスホバーを認識する範囲（ピクセル単位）
                // hitRadius: 5,
            }],
        },

        options: {
            // レスポンシブ指定
            responsive: true,
            scale: {
                ticks: {
                    // 最小値の値を0指定
                    beginAtZero: true,
                    min: 0,
                    // 最大値を指定
                    max: 100,
                }
            }
        }

    });
};


//対数チャート
window.make_log = function make_log(id, labels, data) {
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: '年間提出件数',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
            }],
        },
        options: {
            scales: {
                y: {
                    type: 'logarithmic',
                },

            },
        },
    });
};



//対数チャート
window.make_bar = function make_bar(id, labels, data) {
    var ctx = document.getElementById(id).getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '年間提出件数',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                y: {
                    type: 'logarithmic',
                },
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]

            },
        },
    });
};