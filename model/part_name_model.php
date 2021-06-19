<?php
/**
 * 参加者を全員表示します。
 * index.phpで自動的にデータベースオープンが行われ
 * $gl_arr["pdo"]の中にオブジェクトが入っています。
 * これを利用してSQLを発行し、結果を取得します。
 */
function result_tbl_name (&$gl_arr) {
    //取得配列格納用
    $res = null;
    //発行SQLのひな形を準備します。
    //この部分では$_POSTによるアクセスをあえてしません
    //スーパーグローバル変数はプログラム中で書き換えができるので
    //コピーした値を使用します。
    $sql = "SELECT result_name FROM  sports_db.result_tbl";
    //app_log($sql);

    //SQLをプレアドステートメントにセットします
    $stmt = $gl_arr["pdo"]->prepare( $sql );

    //app_log($stmt,true);
    //パラメータにはめ込んだSQLを実行します。
    //print_r($stmt,true);
    $res = $stmt->execute();
    //実行結果を配列で取得します
    //取得結果から、添え字配列値を除く為、（番号だけ取り除く）
    //オプション　PDO::FETCH_ASSOCを付加します
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //ログを録ります
    //print_r($res,true);
    //app_log($res);

    //取得した配列をリターン
    return $res;


}