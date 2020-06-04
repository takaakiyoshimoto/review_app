<?php
  //urlから値を取得
  if(isset($_GET['id'])) { $id = $_GET['id']; }

  //レビュー済みならread.phpに戻す
  $file = fopen("data/review_data.txt","r");
  //idが存在するかをチェック

  //feofは()ないが最後にいっているかを判定する。!では最後になるまでやる
  while (!feof($file)) {
    //fgetでデータを取得
    $txt = fgets($file);
    $txt = explode(" ",$txt);

  //チェックを行う
    if ($txt[0] == $id){
      //一致した場合reviewed.phpに移動
      header('Location: reviewed.php');
      break;
    }
  }
  fclose($file);
?>

<html>
    <body>
        <?php
            //!で区切り
            $id = explode("!",$id);
            echo "<h3>この商品をレビュー</h3>";
            echo "<p>".$id[0]."</p>";
        ?>
        <h3>総合評価</h3>
        <!-- レビューマーク -->
        <form type="get" action="review_process.php">
            <div class="evaluation">
                <input id="star1" type="radio" name="star" value="5" checked="checked"/>
                <label for="star1"><span class="text">最高</span>★</label>
                <input id="star2" type="radio" name="star" value="4" />
                <label for="star2"><span class="text">良い</span>★</label>
                <input id="star3" type="radio" name="star" value="3" />
                <label for="star3"><span class="text">普通</span>★</label>
                <input id="star4" type="radio" name="star" value="2" />
                <label for="star4"><span class="text">悪い</span>★</label>
                <input id="star5" type="radio" name="star" value="1" />
                <label for="star5"><span class="text">最悪</span>★</label>
            </div>
            <textarea name="comment" rows="4" cols="40">ここに感想を記入してください。</textarea>
            <!-- idも送信 -->
            <?php
              echo "<input type=hidden"." name="."id"." value=".$id[0]."!".$id[1].">";
              echo "<p>".$flag."</p>";
            ?>
            <input type="submit" value="送信">
        </form>
    </body>
</html>
<style>
.evaluation{
  display: flex;
  flex-direction: row-reverse;
  justify-content: flex-end;
}
.evaluation input[type='radio']{
  display: none;
}
.evaluation label{
  position: relative;
  padding: 10px 10px 0;
  color: gray;
  cursor: pointer;
  font-size: 50px;
}
.evaluation label .text{
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  text-align: center;
  font-size: 12px;
  color: gray;
}
.evaluation label:hover,
.evaluation label:hover ~ label,
.evaluation input[type='radio']:checked ~ label{
  color: #ffcc00;
}
</style>