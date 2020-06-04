<?php
//フォームからデータを受け取る
$name = $_POST["user_name"];
$email = $_POST["email"];
$pass = $_POST["pass"];

//ファイルを読み込み
$file = fopen("data/user_cert.txt","r");
    //ユーザチェックを行う(同一のユーザ名がないかを確認)
    $flag = "False";  //同一ユーザがいる場合trueになるフラグ
    //feofは()ないが最後にいっているかを判定する。!では最後になるまでやる
    while (!feof($file)) {
        //fgetでデータを取得
        $txt = fgets($file);
        $txt = explode(" ",$txt);

    //チェックを行う
        if ($txt[0]===$name){
            //一致した場合フラグをtrueに変更してループを抜ける
            $flag="True";
            break;
        }
    }
fclose($file);

//ファイルに書き込む
$file = fopen("data/user_cert.txt","a");
    //既存のユーザーに同一ユーザがいなければ書き込みを行う
    if ($flag=="False"){
        fwrite($file,$name." ".$email." ".$pass."\n");
    }
fclose($file);
?>

<!--htmlデータ書き込み -->
<html>
    <head>
        <meta charset="utf-8">
        <title>File書き込み</title>
    </head>
    <body>
        <?php
            //flagがTrueなら
            if($flag==="True"){
                echo "<h1>すでに登録済みのユーザー名です。</h1>";
            }else{
                echo "<h1>登録しました。</h1>";
            }
        ?>
        
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>