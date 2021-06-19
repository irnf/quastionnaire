<?php
/**
 * ---------Retro FW Ver0.01 (Whiteia)--------
 * 
 * Create: Tomoya_action /2020/04/26
 * MIT Licence
 * -------------------------------------------
 * 
 *  ------------------------------------------
 * func_name           | memo
 * ===========================================
 * 
 * header()            | HTTPリクエスト
 * isset()             | 値が入っているかチェック
 * nl2br()             | 改行文字の前に<br>を挿入
 * 
 * -------------------------------------------
 * update memo
 *   2020/04/26 : comment out
 * 
 * 
 */
/**
 * データベース接続なし
 * コネクションなし
 */
    //HTTPリクエスト
    header('Content-type: text/plain; charset= UTF-8');
    //値が入っているときの処理
    if(isset($_POST['userid']) && isset($_POST['passward'])){
        //$idにuseridを代入
        $id = $_POST['userid'];
        //$pasにpasswordを代入
        $pas = $_POST['passward'];
        $str = "AJAX REQUEST SUCCESS\nuserid:".$id."\npassward:".$pas."\n";
        //改行文字の前に<br>を挿入
        $result = nl2br($str);
        echo $result;
    //値が入ってないときの処理
    }else{
        echo 'FAIL TO AJAX REQUEST';
    }
?>