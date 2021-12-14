$(function() {
    let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
    let likeReviewId; //変数を宣言
    like.on('click', function() { //onはイベントハンドラー
        let $this = $(this); //this=イベントの発火した要素＝iタグを代入
        likeReviewId = $this.data('review-id'); //iタグに仕込んだdata-review-idの値を取得
        //ajax処理スタート
        $.ajax({
                headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
                url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
                type: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
                data: { //サーバーに送信するデータ
                    'hiyari_id': likeReviewId //いいねされた投稿のidを送る
                },
            })
            //通信成功した時の処理
            .done(function(data) {
                $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
                $this.next('.like-counter').html(data.review_likes_count);
            })
            //通信失敗した時の処理
            .fail(function() {
                console.log('fail');
            });
        like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。

    });
});




//値をグラフに表示させる
// Chart.plugins.register({
//     afterDatasetsDraw: function(chart, easing) {
//         var ctx = chart.ctx;

//         chart.data.datasets.forEach(function(dataset, i) {
//             var meta = chart.getDatasetMeta(i);
//             if (!meta.hidden) {
//                 meta.data.forEach(function(element, index) {
//                     // 値の表示
//                     ctx.fillStyle = 'rgb(0, 0, 0,0.8)'; //文字の色
//                     var fontSize = 12; //フォントサイズ
//                     var fontStyle = 'normal'; //フォントスタイル
//                     var fontFamily = 'Arial'; //フォントファミリー
//                     ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

//                     var dataString = dataset.data[index].toString();

//                     // 値の位置
//                     ctx.textAlign = 'center'; //テキストを中央寄せ
//                     ctx.textBaseline = 'middle'; //テキストベースラインの位置を中央揃え

//                     var padding = 5; //余白
//                     var position = element.tooltipPosition();
//                     ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);

//                 });
//             }
//         });
//     }
// });