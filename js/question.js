//jQueryを使用する("場合、呼び出し元のJSに書きます（　開始　）
$(function(){
    $("body")
    .on(
        "click"
        ,"#btn1"
        ,function(){
            console.log("btn1 was clicked");
            //alert("新規登録を開始します。");
            //入力情報格納用
            //var obj = document.forms["question"];
            //非同期通信でリストを更新します。
            $.ajax(
                {
                    //-----HTTP通信の種類を指定します-----//
                    type  : 'post',
                    //-----通信先のURLを指定します-----//
                    url   : 'index.php?action=result_add',
                    //送信パラメータを指定します-----//
                    data  : {
                        //val関数を使用してセレクトボックスのvalue値を
                        q1 : $("#q1").val(),
                        q2 : $('input:radio[name="q2"]:checked').val(),
                        q3 : $('input:radio[name="q3"]:checked').val(),
                        q4 : $('input:radio[name="q4"]:checked').val(),
                        q5 : $('input:radio[name="q5"]:checked').val(),
                        q6 : $('input:radio[name="q6"]:checked').val(),
                        q7 : $('input:radio[name="q7"]:checked').val(),
                        q8 : $("#q8").val()
                        //$(obj).serialize(),
                    },
                    //jsonで返却
                    dataType : "html",
                    //-----通信が静甲下場合の処理を定義します。-----//
                    success : function(data) {
                        //-----console.log("ここまでできてる");-----//
                        console.log(data);
                        //-----formのactionにthanks.phpを追加-----//
                        //form.attr('action','./thanks.php');
                        //setAction('./thanks.php');                        
                        //document.question.action = './thanks.php';
                        $('#question').attr('action', './index.php?action=thanks');
                        //-----formをsubmit-----//
                        //form.submit();
                        $('#question').submit();
                        //-----アンケートありがとうのページ追加-----//
                        //location.href='./index.php?action=thanks';
                        //----フォームのaction先を格納する----//

                        //-----に戻る-----//


                        console.log(data);

                        //入力エリアをクリアします
                        //$("#q1").val(""),
                        //$('input:radio[name="q2"]').prop('checked',false),
                        //$('input:radio[name="q3"]').prop('checked',false),
                        //$('input:radio[name="q4"]').prop('checked',false),
                        //$('input:radio[name="q5"]').prop('checked',false),
                        //$('input:radio[name="q6"]').prop('checked',false),
                        //$('input:radio[name="q7"]').prop('checked',false),
                        //$("#q8").val("")

                        
                        //返却値をJSON化
                        //HTML文字列で来ている場合、かっこで
                        //かこっておかないと、JSONオブジェクトとして認識されない
                    }
                }
            ).done(function(data) {
                console.log("成功");   
            }).fail(function(data){
                console.log("失敗");
            });
        }
    );
});