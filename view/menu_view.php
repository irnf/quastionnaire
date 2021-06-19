<html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <!--InternetExplorerのブラウザではバージョンによって崩れることがあるので、互換表示させないために設定するmetaタグ-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Bootstrapのcss読み込み-->
    <link rel="stylesheet" href="./css/bootstrap.min.css" rel="stylesheet">
    <!--BootstrapのJS読み込み-->
    <script type="text/javvascript" src="./js/bootstrap.min.js"></script>
    <title>理学部スポーツ大会参加登録アンケート</title>
  </head>
  <body>
    <form action="index.php?action=menu_check.php" method="POST">
    <div align="center">
      <button type="button" name="manubtn1" class="btn btn-primary btn-lg" onclick="location.href='http://localhost/questionnaire/index.php?action=question_form'">
        参加者(登録フォーム)</button>
    </div>
    <br>
    <div align="center">
      <button type="button" name="manubtn2" class="btn btn-primary btn-lg" onclick="location.href='http://localhost/questionnaire/index.php?action=chart'">
        管理者(管理画面)</button>
    </div>
    </form>
  </body>
</html>