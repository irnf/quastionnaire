<?php

/**
 * DBに接続します。
 * 値を共有するため、参照渡し
 */
function connect_db( &$gl_arr ) {

    // データベースに接続します
    // 今回はindex.phpで例外キャッチを行っているため
    // try文は不要です。
    $gl_arr["pdo"] = new PDO( DB_DSN, DB_USER, DB_PASS );

}

/**
 * DBをクローズします。
 * 値を共有するため、参照渡し
 */
function close_db( &$gl_arr ) {

    // データベースをクローズします
    $gl_arr["pdo"] = null;

}


