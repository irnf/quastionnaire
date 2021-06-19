<html lang="ja">
    <head>
        <meta charset="utf-8"/>
        <!--InternetExplorerのブラウザではバージョンによって崩れることがあるので、互換表示をさせないために設定するmetaタグ-->
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <!--Bootstrapのcss読み込み-->
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <!--BootstrapのJS読み込み-->
        <script type="text/javascript" src="./js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./js/jquery.js"></script>
        <script type="text/javascript" src="./js/question.js"></script>
        <title>理学部スポーツ大会参加登録アンケート</title>
    </head>
    <body>
        <form  method="post" id = "question" name="question">
            <main>
                <div class="py-5 text-center">
                    <img  src="./yamagata_univ.png">
                    <h2>理学部スポーツ大会参加登録アンケート</h2>
                </div>
            </main>
            <div align="center">
                <b>Q1.名前を記入してください(漢字フルネーム、スペースなし)</b>
                <input type="text" id="q1" name="q1" placeholder="Your name" size="10" value="">
            </div>
            <div align="center">
                <b>Q2.課程を教えてください(必須)</b>
                <input type="radio" class="q2" name="q2" value="1">学士課程
                <input type="radio" class="q2" name="q2" value="2">修士課程
                <input type="radio" class="q2" name="q2" value="3">博士課程
                <!--<input type="radio" class="q2" name="q2" value="その他">その他-->
            </div>
            <div align="center">
                <b>Q3.学年を教えてください</b>
                <input type="radio" class="q3" name="q3" value="1">1年
                <input type="radio" class="q3" name="q3" value="2">2年
                <input type="radio" class="q3" name="q3" value="3">3年
                <input type="radio" class="q3" name="q3" value="4">4年
                <!--<input type="radio" class="q3" name="q3" value="その他">その他-->
            </div>
            <div align="center">
                <b>Q4.専攻・専門領域を教えてください(学部1年生は希望のコースを選択)</b>
                <input type="radio" class="q4" name="q4" value="1">物理学
                <input type="radio" class="q4" name="q4" value="2">化学
                <input type="radio" class="q4" name="q4" value="3">生物学
                <input type="radio" class="q4" name="q4" value="4">地球科学
                <input type="radio" class="q4" name="q4" value="5">数学・データサイエンス
                <!--<input type="radio" class="q4" name="q4" value="その他">その他-->
            </div>
            <div align="center">
                <b>Q5.第1希望の競技を選択</b>
                <input type="radio" class="q5" name="q5" value="1">フットサル
                <input type="radio" class="q5" name="q5" value="2">ソフトボール
                <input type="radio" class="q5" name="q5" value="3">ソフトテニス
                <input type="radio" class="q5" name="q5" value="4">バドミントン
                <input type="radio" class="q5" name="q5" value="5">バスケットボール
                <input type="radio" class="q5" name="q5" value="6">バレーボール
                <input type="radio" class="q5="name="q5" value="7">卓球
            </div>
            <div align="center">
                <b>Q6.第2希望の競技を選択</b>
                <!--<input type="hidden" value="q66" name="q6">-->
                <input type="radio" class="q6" name="q6" value="1">フットサル
                <input type="radio" class="q6" name="q6" value="2">ソフトボール
                <input type="radio" class="q6" name="q6" value="3">ソフトテニス
                <input type="radio" class="q6" name="q6" value="4">バドミントン
                <input type="radio" class="q6" name="q6" value="5">バスケットボール
                <input type="radio" class="q6" name="q6" value="6">バレーボール
                <input type="radio" class="q6" name="q6" value="7">卓球
            </div>
            <div align="center">
                <b>Q5.第3希望の競技を選択</b>
                <input type="radio" class="q7" name="q7" value="1">フットサル
                <input type="radio" class="q7" name="q7" value="2">ソフトボール
                <input type="radio" class="q7" name="q7" value="3">ソフトテニス
                <input type="radio" class="q7" name="q7" value="4">バドミントン
                <input type="radio" class="q7" name="q7" value="5">バスケットボール
                <input type="radio" class="q7" name="q7" value="6">バレーボール
                <input type="radio" class="q7" name="q7" value="7">卓球
            </div>
            <div align="center">
                <b>Q8. 質問・コメント等があれば記入してください(自由記述)</b>
                <input type="text" id="q8" name = "q8" placeholder="質問・コメント等" size="40" value="" /><br>
            </div>

            <div align="center">
                <input type="butten" id="btn1" class="btn btn-primary btn-lg" value="確認提出"></type>
                <!--<button id="btn1" class="btn btn-primary btn-lg" href="http://localhost/questionnaire/index.php?action=menu">確認提出</button> -->
            </div>
        </form>
            
        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy;2021 Ymamagata University</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="https://www.yamagata-u.ac.jp/jp/" target="_blank">Yamagata University</a></li>
            </ul>
        </footer>
    </body>
</html>