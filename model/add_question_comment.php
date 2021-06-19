<?php
/**
 * アンケートの新規登録を行います。
 * 
 * index.phpで自動的にオープンベースオープンが行われ
 * $gl_arr["pdo"]の中にオブジェクトが入っています。
 * これを利用してSQLを発行し、結果を取得します。
 */

 function add_question_comment_detail(&$gl_arr){
     //取得配列格納用
     $res;
     //print_r($gl_arr["POST"]);

     //発行SQLのひな型を準備します。
     $sql = "INSERT INTO sports_db.comment_tbl";
 }