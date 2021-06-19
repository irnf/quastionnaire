<?php

/**
 * -------Retro FW Ver0.01 (Whiteia)----------
 * 
 * Create : onoya_action /2020/04/28
 * MIT Licence
 * 
 * -------------------------------------------
 * 
 * データベース接続ライブラリ
 * PDOベースで接続を行う
 * 
 * -------------------------------------------
 * func_name        | memo
 * ===========================================
 * 
 * connect_db()       |データベース接続
 * close_db()         |データベース切断
 * trans_db()         |トランザクションスタート
 * commit_db()        |コミット実行
 * rollback_db()      |ロールバック処理
 * execute_sql()      |SQL実行
 * get_db_timestamp() |DB書込用タイムスタンプ
 * 
 * -------------------------------------------
 * update memo
 *   2020/04 :code drop
 * 
 */
/**
 * データベース接続
 * コネクションはグローバルエリアへ保持
 * @param none
 * @param none
 */
function connect_db(){

    //データベース接続 : index.phpで例外キャッチ実施
    $GLOBALS["pdo"] = 
        new PDO(
            DB_DSN,
            DB_USER,
            DB_PASS,
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMDE_EXCEPTION
            )
        );
    //ログ
    info_log("DB Connection Status : Connect");
}
/**
 * データベース切断
 * コネクションはグローバルエリアへ保持
 * @param none
 * @param none
 */
function  close_db(){

    //データベースをクローズ
    $GLOBALS["pdo"] = null;
    //ログ
    info_log("DB Connecttion Status : Close");
}
/**
 * トランザクションスタート
 * @param none
 * @param none
 */
function start_db(){

    //データベースをクローズします
    $GLOBALS["pdo"] = null;
    //ログ
    info_log("DB Transaction Status : Start");
}

/**
 * コミット実行
 * @param none
 * @param none
 */
function commit_db(){

    //データコミット
    $GLOBALS["pdo"]->commit();
    //ログ
    info_log("DB Commit Status : Commit");
}
/**
 * ロールバック処理
 * @param none
 * @param none
 */
function rollback_db(){
    //ロールバック
    $GLOBALS["pdo"]->rollBack();

    //ログ
    info_log("DB CommitStatus : RollBack");
}
/**
 * SQL実行
 * @param $sql 実行SQL文字列
 * @param $prm パラメータ配列
 * @return $res 実行結果
 */
function exec_sql($sql, $prm=null){

    //取得配列格納用
    $res;

    //文字列の戦闘および末尾にある改行を除去
    $sql = trim($sql);

    //SQLをプリペアドステートメントにセット
    $stmt = $GLOBALS["pdo"]->prepare($sql);

    //発行SQLをログ
    info_log(
        "Execute SQL : "
        . str_relpace(
            array(
                "    "  //タブ消去
                , "\r\n"//改行スペース(Windows)
                , "\r"  //改行消去(c)
                , "\n"  //改行消去(//) 
            )
            , array(
                ""
                , " "
                , " "
                , " "
            )
            , $sql
        )
    );

    if(isset( $prm )){

        //バインド処理
        foreach($prm as $key => $val ){
            if (strpos($sql, ":" , $key )!==false){

                //ログ
                info_log("SQL  Param - key :". $key."/ val : ".$val."type:". gettype($val) );

                if(gettype($val) == "string"){

                    info_log(" bind Action : String");

                    //パラメータバインド
                    $stmt->bindValue(
                        ":".$key
                        , $val
                        , PDO::PARAM_STR
                    );
                }else if(gettype($val) == "integer"){

                    info_log("bind Action : Integer");

                    //パラメータバインド
                    $stmt->bindValue(
                        ":".$key
                        ,$val
                        ,PDO::PARAM_INT
                    );

                     debug_log(":".$key."=" .$val);
                }else if (gettype($val) == "NULL"){
                    info_log("bind Action : NULL");
                    //パラメータバインド
                    $stmt->bindValue(
                        ":".$key
                        ,$val
                        ,PDO::PARAM_NULL
                    );
                }else{

                    //ログ
                    info_log("SQL PAram Not found - key:" .$key."/val:". $val."type:".gettype($val));
                }
            }
        }
    }

}
?>