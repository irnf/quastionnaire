<?php

/**
 * アンケートの新規登録を行います。
 * 
 * index.phpで自動的にデータベースオープンが行われ
 * $gl_arr["pdo"]の中にオブジェクトが入っています。
 * これを利用してSQLを発行し、結果を取得します。
 */

 function add_question_result_detail(&$gl_arr) {
     //取得配列格納用
     $res;
     //print_r($gl_arr["POST"]);

     //発行SQLのひな型を準備します。
     $sql = "INSERT INTO sports_db.result_tbl(result_course, result_grade, result_ac, result_name) VALUES(:q2,:q3,:q4,:q1)" ;

     //SQLをプレアドステートメントにセットします
     $stmt = $gl_arr["pdo"]->prepare($sql);
     app_log(print_r($gl_arr["POST"]));

     $stmt->bindParam(":q2",$gl_arr["POST"]['q2']);
     $stmt->bindParam(":q3",$gl_arr["POST"]['q3']);
     $stmt->bindParam(":q4",$gl_arr["POST"]['q4']);
     $stmt->bindParam(":q1",$gl_arr["POST"]['q1']);

     //パラメータをはめ込んだSQLを実行します。
     $res = $stmt->execute();
     app_log($res);

     //取得した配列をリターン
     return $res;
 }

?>