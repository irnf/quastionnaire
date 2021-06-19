<?php
/**
 * コメント・質問を表示します。
 * index.phpで自動的にデータベースオープンが行われ
 * $gl_arr["pdo"]の中にオブジェクトが入っています。
 * これを利用してSQLを発行し、結果を取得します。
 */
function comment_search (&$gl_arr){
    //取得配列格納用
    $res;
    //発行SQLのひな形を準備します。
    //この部分では$_POSTによるアクセスをあえてしません
    //スーパーグローバル変数はプログラムで書き換えができるので
    //コピーした値を利用します。
    $sql = "SELECT insert_dt,comment_status,comment_check,comment_comment FROM  sports_db.comment_tbl";

    //SQLをプレアドステートメントにセットします
    $stmt = $gl_arr["pdo"] -> prepare($sql);

    //パラメータにはめこんだSQLを実行します。
    $res = $stmt->execute();

    //実行結果を配列で取得します
    //取得結果から、添え字配列値を除くため、（番号だけ取り除く）
    //オプション　PDO::FETCH_ASSOCを付加します
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //取得した配列をリターン
    return $res;
}
?>