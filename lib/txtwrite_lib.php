<?php

/**
 * テキスト書き出しライブラリ
 *
 * テキスト書き出しを行う共通ライブラリ
 */

/**
 * テキスト書き出し
 *
 * テキストファイルに文字列を書き出します。
 *
 * @param $str 書き出し文字列
 * @return none
 */
//日本時間に設定
date_default_timezone_set('Asia/Tokyo');
//print(WRITE_PATH . "\n");
//print(WRITE_TXT);
function write_txt( $str ) {
    // テキスト書出ファイル有無チェック
    if( file_exists( WRITE_PATH . WRITE_TXT) ) {
        //print(WRITE_PATH . WRITE_TXT);
        //キャッシュクリア
        clearstatcache();
        //更新日時取得
        $last_update_date = date(
                                "Ymd"
                                , filemtime( WRITE_PATH . WRITE_TXT )
                            );

        //更新日時が本日でない場合、現在のファイルをリネーム
        if( date( "Ymd" ) != $last_update_date ) {

            //ファイル名を分割
            $reFileStr = explode( ".", WRITE_TXT );

            //リネーム用ファイル名を生成
            $reFileName = $reFileStr["0"]
                        . $last_update_date
                        . "."
                        . $reFileStr["1"];

            //現在のファイルをリネーム
            rename(
                WRITE_PATH . WRITE_TXT,
                WRITE_PATH . $reFileName
            );

            //キャッシュクリア
            clearstatcache();

        }

    }

    //ファイルをオープンして排他ロック
    $open_status = fopen( WRITE_PATH . WRITE_TXT, "a" );
    flock( $open_status, LOCK_EX );

    //テキストファイル書き出しを実行
    fwrite( $open_status, $str );

    //ファイルをクローズする
    fclose( $open_status );

}


/**
 * アプリケーションログ書き出し
 *
 * 以下の項目を付け加え、ログを書き出します。
 *   時間
 *   IPアドレス
 *   モジュール名称
 *   実行プログラム行数
 *
 * @param $str 書き出し文字列
 * @return none
 */
function app_log( $str ) {

    //----- 書き出し時間の算出 -----//

    //マイクロ秒、エポックタイムを取得
    list($msec, $sec) = explode( " ", microtime() );

    // 書き出し時間の算出
    $timestamp = date( "Y/m/d H:i:s" , $sec ) // YYYY/MM/DD hh:mm:ssまで
               . "."
               . ( int ) ( $msec * 10000 );   // マイクロ秒

    //----- 実行モジュール情報 -----//

    $pg_trace = debug_backtrace();

    // 実行モジュール情報
    $trace_info = " ( "
                . $pg_trace["0"]["file"]    // ファイル名
                . " / "
                . $pg_trace["0"]["line"]    // 行数
                . " ) ";

    //----- ログ生成 -----//

    // ログヘッダー生成
    $log_header = "["
                . $timestamp                  // 実行時間
                . " / "
                . $_SERVER["SERVER_ADDR"]   // IPアドレス
                . $trace_info                 // モジュール情報
                . "] ";

    // ログ書き出し
    write_txt( $log_header . $str  . "\n" );

}

