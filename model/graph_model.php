<?php
/**
 * 専門領域ごとにスポーツ希望をグラフ化します。
 * index.phpで自動的にデータベースオープンが行われ
 * $gl_arr["pdo"]の中にオブジェクトが入っています。
 * これを利用してSQLを発行し、結果を取得します。
 */
function graph_search (&$gl_arr) {
    //取得配列格納用
    $res;
    //発行SQLのひな形を準備します。
    //この部分では$_POSTによるアクセスをあえてしません
    //スーパーグローバル変数はプログラム中で書き換えができるので
    //コピーした値を使用します。
    $sql = "SELECT
    seven.result_ac
    , seven.foot
    , seven.softball
    , seven.softtennis
    , seven.bad
    , seven.bas
    , seven.val
    , seven.tab
    , RUN.run 
from
    ( 
        select
            FSSBBV.result_ac
            , FSSBBV.foot
            , FSSBBV.softball
            , FSSBBV.softtennis
            , FSSBBV.bad
            , FSSBBV.bas
            , FSSBBV.val
            , TAB.tab 
        from
            ( 
                select
                    FSSBB.result_ac
                    , FSSBB.foot
                    , FSSBB.softball
                    , FSSBB.softtennis
                    , FSSBB.bad
                    , FSSBB.bas
                    , VAL.val 
                from
                    ( 
                        select
                            FSSB.result_ac
                            , FSSB.foot
                            , FSSB.softball
                            , FSSB.softtennis
                            , FSSB.bad
                            , BAS.bas 
                        from
                            ( 
                                select
                                    FSS.result_ac
                                    , FSS.foot
                                    , FSS.softball
                                    , FSS.softtennis
                                    , BAD.bad 
                                from
                                    ( 
                                        select
                                            FOOT_SOFTBALL.result_ac
                                            , FOOT_SOFTBALL.foot
                                            , FOOT_SOFTBALL.softball
                                            , SOFTTENNIS.softtennis 
                                        from
                                            ( 
                                                select
                                                    FOOT.result_ac
                                                    , FOOT.foot
                                                    , SOFTBALL.softball 
                                                from
                                                    ( 
                                                        select
                                                            PCS.result_ac
                                                            , count(*) as foot 
                                                        from
                                                            ( 
                                                                SELECT
                                                                    S.comment_cd
                                                                    , S.select_level
                                                                    , S.sports_cd
                                                                    , PC.result_course
                                                                    , PC.result_grade
                                                                    , PC.result_ac
                                                                    , PC.result_name 
                                                                FROM
                                                                    sports_db.select_tbl AS S 
                                                                    LEFT OUTER JOIN ( 
                                                                        SELECT
                                                                            P.result_cd
                                                                            , C.comment_cd
                                                                            , result_course
                                                                            , result_grade
                                                                            , result_ac
                                                                            , result_name 
                                                                        FROM
                                                                            sports_db.result_tbl AS P 
                                                                            LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                                                                ON P.result_cd = C.comment_cd
                                                                    ) as PC 
                                                                        ON S.comment_cd = PC.comment_cd
                                                            ) as PCS 
                                                        WHERE
                                                            PCS.sports_cd = 1 
                                                        group by
                                                            PCS.result_ac
                                                    ) as FOOT 
                                                    LEFT OUTER JOIN ( 
                                                        select
                                                            PCS.result_ac
                                                            , count(*) as softball 
                                                        from
                                                            ( 
                                                                SELECT
                                                                    S.comment_cd
                                                                    , S.select_level
                                                                    , S.sports_cd
                                                                    , PC.result_course
                                                                    , PC.result_grade
                                                                    , PC.result_ac
                                                                    , PC.result_name 
                                                                FROM
                                                                    sports_db.select_tbl AS S 
                                                                    LEFT OUTER JOIN ( 
                                                                        SELECT
                                                                            P.result_cd
                                                                            , C.comment_cd
                                                                            , result_course
                                                                            , result_grade
                                                                            , result_ac
                                                                            , result_name 
                                                                        FROM
                                                                            sports_db.result_tbl AS P 
                                                                            LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                                                                ON P.result_cd = C.comment_cd
                                                                    ) as PC 
                                                                        ON S.comment_cd = PC.comment_cd
                                                            ) as PCS 
                                                        WHERE
                                                            PCS.sports_cd = 2 
                                                        group by
                                                            PCS.result_ac
                                                    ) as SOFTBALL 
                                                        ON FOOT.result_ac = SOFTBALL.result_ac
                                            ) AS FOOT_SOFTBALL 
                                            LEFT OUTER JOIN ( 
                                                select
                                                    PCS.result_ac
                                                    , count(*) as softtennis 
                                                from
                                                    ( 
                                                        SELECT
                                                            S.comment_cd
                                                            , S.select_level
                                                            , S.sports_cd
                                                            , PC.result_course
                                                            , PC.result_grade
                                                            , PC.result_ac
                                                            , PC.result_name 
                                                        FROM
                                                            sports_db.select_tbl AS S 
                                                            LEFT OUTER JOIN ( 
                                                                SELECT
                                                                    P.result_cd
                                                                    , C.comment_cd
                                                                    , result_course
                                                                    , result_grade
                                                                    , result_ac
                                                                    , result_name 
                                                                FROM
                                                                    sports_db.result_tbl AS P 
                                                                    LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                                                        ON P.result_cd = C.comment_cd
                                                            ) as PC 
                                                                ON S.comment_cd = PC.comment_cd
                                                    ) as PCS 
                                                WHERE
                                                    PCS.sports_cd = 3 
                                                group by
                                                    PCS.result_ac
                                            ) AS SOFTTENNIS 
                                                ON FOOT_SOFTBALL.result_ac = SOFTTENNIS.result_ac
                                    ) AS FSS 
                                    LEFT OUTER JOIN ( 
                                        select
                                            PCS.result_ac
                                            , count(*) as bad 
                                        from
                                            ( 
                                                SELECT
                                                    S.comment_cd
                                                    , S.select_level
                                                    , S.sports_cd
                                                    , PC.result_course
                                                    , PC.result_grade
                                                    , PC.result_ac
                                                    , PC.result_name 
                                                FROM
                                                    sports_db.select_tbl AS S 
                                                    LEFT OUTER JOIN ( 
                                                        SELECT
                                                            P.result_cd
                                                            , C.comment_cd
                                                            , result_course
                                                            , result_grade
                                                            , result_ac
                                                            , result_name 
                                                        FROM
                                                            sports_db.result_tbl AS P 
                                                            LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                                                ON P.result_cd = C.comment_cd
                                                    ) as PC 
                                                        ON S.comment_cd = PC.comment_cd
                                            ) as PCS 
                                        WHERE
                                            PCS.sports_cd = 4 
                                        group by
                                            PCS.result_ac
                                    ) AS BAD 
                                        ON FSS.result_ac = BAD.result_ac
                            ) AS FSSB 
                            left outer join ( 
                                select
                                    PCS.result_ac
                                    , count(*) as bas 
                                from
                                    ( 
                                        SELECT
                                            S.comment_cd
                                            , S.select_level
                                            , S.sports_cd
                                            , PC.result_course
                                            , PC.result_grade
                                            , PC.result_ac
                                            , PC.result_name 
                                        FROM
                                            sports_db.select_tbl AS S 
                                            LEFT OUTER JOIN ( 
                                                SELECT
                                                    P.result_cd
                                                    , C.comment_cd
                                                    , result_course
                                                    , result_grade
                                                    , result_ac
                                                    , result_name 
                                                FROM
                                                    sports_db.result_tbl AS P 
                                                    LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                                        ON P.result_cd = C.comment_cd
                                            ) as PC 
                                                ON S.comment_cd = PC.comment_cd
                                    ) as PCS 
                                WHERE
                                    PCS.sports_cd = 5 
                                group by
                                    PCS.result_ac
                            ) AS BAS 
                                ON FSSB.result_ac = BAS.result_ac
                    ) as FSSBB 
                    left outer join ( 
                        select
                            PCS.result_ac
                            , count(*) as val 
                        from
                            ( 
                                SELECT
                                    S.comment_cd
                                    , S.select_level
                                    , S.sports_cd
                                    , PC.result_course
                                    , PC.result_grade
                                    , PC.result_ac
                                    , PC.result_name 
                                FROM
                                    sports_db.select_tbl AS S 
                                    LEFT OUTER JOIN ( 
                                        SELECT
                                            P.result_cd
                                            , C.comment_cd
                                            , result_course
                                            , result_grade
                                            , result_ac
                                            , result_name 
                                        FROM
                                            sports_db.result_tbl AS P 
                                            LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                                ON P.result_cd = C.comment_cd
                                    ) as PC 
                                        ON S.comment_cd = PC.comment_cd
                            ) as PCS 
                        WHERE
                            PCS.sports_cd = 6 
                        group by
                            PCS.result_ac
                    ) as VAL 
                        ON FSSBB.result_ac = VAL.result_ac
            ) as FSSBBV 
            left outer join ( 
                select
                    PCS.result_ac
                    , count(*) as tab 
                from
                    ( 
                        SELECT
                            S.comment_cd
                            , S.select_level
                            , S.sports_cd
                            , PC.result_course
                            , PC.result_grade
                            , PC.result_ac
                            , PC.result_name 
                        FROM
                            sports_db.select_tbl AS S 
                            LEFT OUTER JOIN ( 
                                SELECT
                                    P.result_cd
                                    , C.comment_cd
                                    , result_course
                                    , result_grade
                                    , result_ac
                                    , result_name 
                                FROM
                                    sports_db.result_tbl AS P 
                                    LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                        ON P.result_cd = C.comment_cd
                            ) as PC 
                                ON S.comment_cd = PC.comment_cd
                    ) as PCS 
                WHERE
                    PCS.sports_cd = 7 
                group by
                    PCS.result_ac
            ) AS TAB 
                ON FSSBBV.result_ac = TAB.result_ac
    ) as seven 
    left outer join ( 
        select
            PCS.result_ac
            , count(*) as run 
        from
            ( 
                SELECT
                    S.comment_cd
                    , S.select_level
                    , S.sports_cd
                    , PC.result_course
                    , PC.result_grade
                    , PC.result_ac
                    , PC.result_name 
                FROM
                    sports_db.select_tbl AS S 
                    LEFT OUTER JOIN ( 
                        SELECT
                            P.result_cd
                            , C.comment_cd
                            , result_course
                            , result_grade
                            , result_ac
                            , result_name 
                        FROM
                            sports_db.result_tbl AS P 
                            LEFT OUTER JOIN sports_db.comment_tbl AS C 
                                ON P.result_cd = C.comment_cd
                    ) as PC 
                        ON S.comment_cd = PC.comment_cd
            ) as PCS 
        WHERE
            PCS.sports_cd = 8 
        group by
            PCS.result_ac
    ) as RUN 
        on seven.result_ac = RUN.result_ac
";

//SQLをプレアドステートメントにセットします
$stmt = $gl_arr["pdo"]->prepare($sql);

//パラメータにはめ込んだSQLを実行します。
$res = $stmt -> execute();

//実行結果を配列で取得します
//取得結果から、添え字配列を除くため、（番号だけ取り除く）
//オプション　PDO::FETCH_ASSOCを付加します
$res = $stmt->fetchAll(PDO::FETCH_ASSOC);

//app_log($res);


//取得した配列をリターン
return $res;
}
?>