<?php

// var_dump($_GET);
// exit();
$contents = $_GET["contents"];
// var_dump($contents);//NULLになる
// exit();
$datetimedate = $_GET["now"];
// var_dump($datetimedate);
// exit();

//スペース区切りで最後に改行
$write_data = "{$contents} {$datetimedate}\n";
// var_dump($write_data);
// exit();
//aはファイルを開くときにどう言う開き方をするか
$file = fopen('./tweet.txt', 'w');
// var_dump($file);
// exit();
//ファイルをロック
//先にロックかけるのは他人に読み込まれるのを防ぐため
flock($file, LOCK_EX);
//どのファイルになんと書き込むか
fwrite($file, $write_data);
//ロック解除
flock($file, LOCK_UN);
//ファイルを閉じる
fclose($flie);
header("Location:tweet_main.php");
