<?php

/**
 * 集計一覧画面表示ファイル
 * 
 * 集計一覧を表示します。
 * 
 */

 ///////////////////////////////////////////////////////////////
 //定数定義
 //
 //下の定数定義はフロントコントローラ上で
 //使用されます。
 ///////////////////////////////////////////////////////////////

 //データベース使用区分
 define("DB_USE", "on");


 //セッション使用区分
 define("SESSION_USE",   "off");

 //データベーストランザクション
 define("DB_TRANSACTION","off");


 ///////////////////////////////////////////////////////////////
 //表示処理
 //今回のMVCパターンではactionファイルはすべて
 //この関数を定義した上で、処理を記述します。
 //index.php上の変数を参照・更新するため、引数はすべて参照渡しになります。
 ///////////////////////////////////////////////////////////////
 function exec_action(&$gl_arr) {

    //グラフ化するためのファイル
    include_once(BASE_PATH . "model/graph_model.php");
    $gl_arr["VIEW_DATA"]["graph_list"] = graph_search($gl_arr);
    //app_log(print_r($gl_arr["VIEW_DATA"]["graph_list"][0]["run"],true));

    //参加者一覧の名前を表示するファイル
    include_once( BASE_PATH . "model/part_name_model.php");
    $gl_arr["VIEW_DATA"]["part_list"]["name"] = result_tbl_name($gl_arr);
    //app_log(print_r($gl_arr["VIEW_DATA"]["part_list"],true));

    //参加者一覧の課程を表示するファイル
    include_once( BASE_PATH . "model/part_course_model.php");
    $gl_arr["VIEW_DATA"]["part_list"]["course"] = result_tbl_course($gl_arr);

    //参加者一覧の学年を表示するファイル
    include_once( BASE_PATH . "model/part_grade_model.php");
    $gl_arr["VIEW_DATA"]["part_list"]["grade"] = result_tbl_grade($gl_arr);

    //参加者一覧の専攻・専門を表示するファイル
    include_once( BASE_PATH . "model/part_ac_model.php");
    $gl_arr["VIEW_DATA"]["part_list"]["ac"] = result_tbl_ac($gl_arr);

    //コメント一覧を表示するファイル
    include_once( BASE_PATH . "model/comment_model.php");
    $gl_arr["VIEW_DATA"]["comment_list"] = comment_search($gl_arr);

    //この処理は静的HTMLを返すだけなので
    //次画面のファイルを指定するのみになります。

    //表示画面を指定
    //viewフォルダ内のファイル名を指定します。
    //print_r($gl_arr["VIEW_DATA"]["part_list"]["course"]);
    $gl_arr["NEXT_VIEW"] = "chart_view";
 }