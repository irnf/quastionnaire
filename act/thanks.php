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

    include_once(BASE_PATH . "model/course_tbl_model.php");
    $gl_arr["VIEW_DATA"]["q2"] = course_tbl($gl_arr);

    include_once(BASE_PATH . "model/grade_tbl_model.php");
    $gl_arr["VIEW_DATA"]["q3"] = grade_tbl($gl_arr);
    
    include_once(BASE_PATH . "model/ac_tbl_model.php");
    $gl_arr["VIEW_DATA"]["q4"] = ac_tbl($gl_arr);

    include_once(BASE_PATH . "model/sports_tbl_model_first.php");
    $gl_arr["VIEW_DATA"]["q5"] = sports_tbl_first($gl_arr);

    include_once(BASE_PATH . "model/sports_tbl_model_second.php");
    $gl_arr["VIEW_DATA"]["q6"] = sports_tbl_second($gl_arr);

    include_once(BASE_PATH . "model/sports_tbl_model_third.php");
    $gl_arr["VIEW_DATA"]["q7"] = sports_tbl_third($gl_arr);

    //app_log(print_r($gl_arr["VIEW_DATA"]));
    $gl_arr["NEXT_VIEW"] = "thanks_view";
 }