<?php
//フォームからデータを受け取る
$user_name = $_POST["user_name"];
$pass = $_POST["pass"];

//ファイルを読み込み。ログインを行う
$file = fopen("data/user_cert.txt","r");
    $flag = "False";  //同一ユーザがいる場合trueになるフラグ
    //feofは()ないが最後にいっているかを判定する。!では最後になるまでやる
    while (!feof($file)) {
        //fgetでデータを取得
        $txt = fgets($file);
        $txt = explode(" ",$txt);

        //半角スペースによって後の文字列一致判定が失敗したためtrimを行う
        $txt[2] = trim($txt[2]);

    //チェックを行う
        //一致するユーザ名存在するか
        if ($txt[0]==$user_name){
            //一致した場合パスワードを確かめる
            //あっていればflagにtrue,あっていなければFailedを代入。
            if($txt[2]==$pass){
                $flag = "True";
                //cookieにユーザ名を保存,30日間有効
                setcookie("user_name", $user_name, time() + 60 * 60 * 24 * 30);
            }else{
                $flag = "Failed";
            }
            //一致するユーザ名があればループを抜ける
            break;
        }
    }
fclose($file);
?>

<html>
    <head>
        <meta charset="utf-8">
        <title>File書き込み</title>
    </head>
    <body>
        <?php
            //flagがTrueなら
            if($flag=="True"){
                echo "<h1>ようこそ";
                echo $user_name;
                echo "さん</h1>";
            }elseif($flag=="Failed"){
                echo "<h1>パスワードが異なります。</h1>";
            }else{
                echo "<h1>ユーザーが存在しません。</h1>";
            }
        ?>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>

