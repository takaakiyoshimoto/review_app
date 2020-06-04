<?php
//フォームからデータを受け取る
$apple = $_POST["apple"];
$orange = $_POST["orange"];
$grape = $_POST["grape"];

//cookieからユーザ名を取得
$user_name=$_COOKIE["user_name"];

//時間を取得
$time=date("Y/m/d H:i:s");

//ファイルに書き込む
$file = fopen("data/shopping_data.txt","a");
    if ($apple!="" and $apple!=0){
        fwrite($file,$user_name." "."リンゴ"." ".$apple." ".$time." ".uniqid("リンゴ!")."\n");
    }
    if ($orange!="" and $orange!=0){
        fwrite($file,$user_name." "."ミカン"." ".$orange." ".$time." ".uniqid("ミカン!")."\n");
    }
    if ($grape!="" and $grape!=0){
        fwrite($file,$user_name." "."ブドウ"." ".$grape." ".$time." ".uniqid("ブドウ!")."\n");
    }
fclose($file);
?>
<html>
    <body>
        <h1>購入しました。</h1>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>