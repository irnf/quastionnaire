<html lang="ja">
    <head>
        <meta charset="utf-8"/>
        <title>確認ページ</title>
    </head>
    <body>
        <h1>回答ありがとうございました</h1>
        <b>以下の回答で提出しました</b>
    <table>
        <tr><th><h2>q1:</h2></th><td><?php print_r($gl_arr["POST"]["q1"]);?></td></tr>
        <tr><th><h2>q2:</h2></th><td><?php print_r($gl_arr["VIEW_DATA"]["q2"][0]["course_name"]);?></td></tr>
        <tr><th><h2>q3:</h2></th><td><?php print_r($gl_arr["VIEW_DATA"]["q3"][0]["grade_name"]);?></td></tr>
        <tr><th><h2>q4:</h2></th><td><?php print_r($gl_arr["VIEW_DATA"]["q4"][0]["ac_name"]);?></td></tr>
        <tr><th><h2>q5:</h2></th><td><?php print_r($gl_arr["VIEW_DATA"]["q5"][0]["sports_name"]);?></td></tr>
        <tr><th><h2>q6:</h2></th><td><?php print_r($gl_arr["VIEW_DATA"]["q6"][0]["sports_name"]);?></td></tr>
        <tr><th><h2>q7:</h2></th><td><?php print_r($gl_arr["VIEW_DATA"]["q7"][0]["sports_name"]);?></td></tr>
        <tr><th><h2>q8:</h2></th><td><?php print_r($gl_arr["POST"]["q8"]);?></td></tr>
    </table>
    <a href="index.php?action=menu">メニューに戻る</a>
    </body>
</html>