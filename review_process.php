<?php
    $select=$_GET['star'];
    $comment=$_GET['comment'];
    $id=$_GET['id'];

    //selectの値でレビューの評価を受け取る
    switch ($select) {
		case "5":
            $review=5;
            break;
		case "4":
            $review=4;
            break;
		case "3":
            $review=3;
            break;
        case "2":
            $review=2;
            break;
        case "1":
            $review=1;
            break;
    }
    
    //ファイルに書き込む
    $file = fopen("data/review_data.txt","a");
        fwrite($file,$id." ".$select." ".$comment."\n");
    fclose($file);
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>レビューしました</title>
    </head>
    <body>
        <p>レビューしました</p>
        <ul>
            <li><a href="index.php">戻る</a></li>
        </ul>
    </body>
</html>