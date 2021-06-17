<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="favicon.ico">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Londrina+Shadow">

  <title>Positter</title>

  <!-- Bootstrap core CSS -->
  <link href="css/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/dashboard.css" rel="stylesheet">

</head>

<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand title" href="#">Positter</a>
      </div>

    </div>
  </nav>

  <div class="col-md-3">
    ネガティブな内容を入力してください。<br>
    <form action="positter_main.php" method="GET">
      <textarea name="contents" cols="40" rows="4"></textarea>
      <br>
      <input type="submit" value="ポジティブにする" class="btn btn-primary">
    </form>
  </div>

  <div class="col-md-9">

    <div class="table-responsive">
      <p>ここにポジティブな名言に変換して表示します。</p>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>名前</th>
            <th>投稿内容</th>
            <th>投稿時間</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>kayoccoli</td>
            <td>
              <?php
              $contents = $_GET["contents"];
              //mb-マルチバイトの略、str-string、len-length
              $len = mb_strlen($contents, "utf-8");
              if ($len == 0) {
                echo "空白です。";
              } else if ($len > 140) {
                echo "文字数オーバーです。";
              } else if (preg_match("/疲れた/", $contents)) {
                echo "疲れたら休め。やがて休むことに飽きてくる";
              } else if (preg_match("/めっちゃ疲れた/", $contents)) {
                echo "疲れちょると思案がどうしても滅入る。よう寝足ると猛然と自信がわく。";
              } else if (preg_match("/忙しい/", $contents)) {
                echo "「忙しい」という言葉を「充実している」と考えた方が人生楽しい";
              } else if (preg_match("/もうだめだ/", $contents)) {
                echo "困難のうちに、チャンスがある。";
              } else if (preg_match("/もう嫌だ/", $contents)) {
                echo "イヤならやめろ!ただ本当にイヤだと思うほどやってみたか？";
              } else if (preg_match("/諦めよう/", $contents)) {
                echo "諦めたらそこで試合終了ですよ？";
              } else if (preg_match("/失敗した/", $contents)) {
                echo "成功することを学ぶには、まず失敗することを学ばねばならない";
              } else if (preg_match("/できない/", $contents)) {
                echo "あなたが一回失敗したからといって、全てにおいて失敗するわけじゃないわ";
              } else if (preg_match("/きつい/", $contents)) {
                echo "逃げ道はいつも前にある。前に逃げることを「進む」という。";
              } else if (preg_match("/自分が嫌い/", $contents)) {
                echo "自ら機会を創り出し、機会によって自らを変えよ";
              } else if (preg_match("/ハゲ/", $contents)) {
                echo "髪の毛が後退しているのではない。私が前進しているのだ。";
              }
              ?>
            </td>
            <td name="datetimedate">
              <?php

              //タイムゾーンの変更。そのまま日時をとってくると時刻が9時間前-グリニッジ標準時
              date_default_timezone_set('Asia/Tokyo');
              $now = date("Y/m/d H:i:s");
              $datetimedate = $_GET["now"]; //writeに渡せてない
              echo date("Y/m/d H:i:s");
              // $yyyymmdd =  date("Y/m/d H:i:s");
              // $datetimedate = $_GET["yyyymmdd"];
              // echo $datetimedate;
              ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="css/dist/js/bootstrap.min.js"></script>
</body>

</html>