<html>
<html lang="ja">
<head>
  <!--
  <meta name="viewport" content="width=device-width, intial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  -->
  <title>理学部スポーツ大会管理画面</title>
  <meta charset="utf-8">
  <!--なんかを入れます-->
  <link rel="stylesheet" type="text/css" href="./css/bootstrap4.3.1.css">
  <link rel="stylesheet" type="text/css" href="./css/dashboard.css" >
  <!--Graphs-->
 <script type="text/javascript" src="./js/Chart.min.js"></script>
</head>
<body>
  <a id="skippy" class="sr-only sr-only-focusable" href="#content">
    <div class="container">
      <span class="skiplink-text">Skip to main content</span>
    </div>
  </a>  
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 "href="index.php?action=menu">メニューに戻る</a>
    <!--<input class="form-control form-control-dark w-50" type="text" placeholder="Search" aria-label="Search">-->
    <a class="navbar navbar-brand  mr-2 " href="#">理学部スポーツ大会管理画面</a>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

<div class="container-fluid">
  <div class="row">
    <nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="index.php?action=chart#graph">
              <span data-feature="file"></span>
              スポーツ別集計
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="index.php?action=chart#part">
              <span data-feature="home"></span>
              参加者名簿<span class="sr-only">(current)</span>
            </a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feature="file"></span>
              専攻・学年別集計
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=chart#comment">
              <span data-feature="file"></span>
              コメント・質問等
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="d-flex align-items-center text-muted" href="#">
            <span data-feature="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feature="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feature="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feature="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-2 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">スポーツ別集計</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feature="calender"></span>
        This week
      </button>

<!--<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>-->
<div id = "grraph_area" id="graph">
<?php 
include_once(BASE_PATH . "view/graph_view.php");
?>
</div>
<h2>参加者名簿</h2>
<div class="table-responsive" id = "part">
  <?php include_once(BASE_PATH . "view/part_view.php");?>
</div>

<h2>コメント・質問等</h2>
<div class="table-responsive" id="comment">
  <?php include_once(BASE_PATH . "view/comment_view.php"); ?>
</div>
</main>
</div>
</div>



<!--<script type="text/javascript" src="./js/graph2.js"></script>-->
<!--integrityはリソースが提供されたかを検証-->
<script type="text/javascript" src="./js/jquery-3.3.1.slim.min.js"  crossorigin="anonymous">
</script>
<script type="text/javascript" src="./js/bootstrap.bundle.min.js">
</script>
<script type="text/javascript" src="./js/anchor.min.js">
</script>
<script type="text/javascript" src="./js/clipboard.js">
</script>
<script type="text/javascript" src="./js/bs-custom-file-input.min.js">
</script>
<script type="text/javascript" src="./js/application.js">
</script>
<script type="text/javascript" src="./js/search.js">
</script>
<script type="text/javascript" src="./js/ie-emulation-modes-warning.js">  
</script>
</body>
</html>