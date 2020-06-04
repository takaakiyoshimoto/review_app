<?php
//ファイルを読み込む
//ファイル名を変数に入れる
$filename = "data/shopping_data.txt";
$fp = fopen($filename,"r");

//cookieからユーザ名を取得
$user_name=$_COOKIE["user_name"];
?>

<style>
th,td{
  border:solid 1px #aaaaaa;
}
#title{
    background-color:#2196f3;
}

.column{
    background-color:white;
}
</style>

<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>
<table>
<!-- 表の題名を記載 -->
<tr id=title>
    <td>購入物</td>
    <td>個数</td>
    <td>購入日</td>
    <td>購入時間</td>
</tr>
    <?php
        //データの数だけ描画する処理
        //feofは()ないが最後にいっているかを判定する。!では最後になるまでやる
        while (!feof($fp)) {
            //fgetでデータを取得
            $txt = fgets($fp);
            $txt = explode(" ",$txt);
            
            //ユーザ名が自分のものを出力する。
            if($user_name==$txt[0]){
                //出力
                echo "<tr class=column>"."<td>"."<a href="."review.php?id=".$txt[5].">$txt[1]</a>"."</td>"." "."<td>".$txt[2]."</td>"."<td>".$txt[3]."</td>"."<td>".$txt[4]."</td>"."</tr>";
            }
        }
        //fclose
        fclose($fp);
    ?>
</table>
    <ul>
        <li><a href="index.php">戻る</a></li>
    </ul>
</body>
</html>