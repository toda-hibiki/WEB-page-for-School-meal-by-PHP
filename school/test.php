<!DOCTYPE html>
<html lang="ja">
<head>
  <!--背景変更-->
<!--<link rel="stylesheet" href="common/css/sample.css" type="text/css">-->
<meta charset="utf-8">
<title>学食混雑状況</title>
<meta name="description" content="ホーム">
<meta name="google-site-verification" content="QiLEBsbQZUSSBmv0uzcLtKJVw_np_lryXFgjAcnGjJc" />
<link rel="stylesheet" href="common/css/normalize.css">
<link rel="stylesheet" href="common/css/style.css">

<script src="common/js/jquery-1.10.1.min.js"></script>
<script src="common/js/jquery.bxslider/jquery.bxslider.js"></script>
<link rel="stylesheet" href="common/js/jquery.bxslider/jquery.bxslider.css">
<script>
$(document).ready(function() {
  $('.bxslider').bxSlider({
    auto: true,
    speed: 1000,
    pause: 4000
  });
});
</script>
</head>

<body>
  <div id="page">
<header id="pageHead">
	<h1 id="siteTitle">学食混雑状況</h1>
	<p id="catchcopy">中部大学の学食の混雑状況を見れるサイトです．</p>


<!--スライドショー-->
   <div id="pageBody">
   	<section class="mainVisual">
   		<ul class="bxslider">
   			<li>
   				<div class="mainVisualText">
   					<h1>第1食堂</h1>
   					<p>中部大学の中心にあるメインの食堂です<br>メニューも豊富！</p>
   				</div>
   				<img src="images/1.jpg" width="980" height="700" alt="">
   			</li>
   			<li>
   				<div class="mainVisualText">
   					<h1>第3食堂</h1>
   					<p>サラダや定食などのヘルシーなメニューが豊富です</p>
   				</div>
   				<img src="images/3.jpg" width="980" height="700" alt="">
   			</li>
   			<li>
   				<div class="mainVisualText">
   					<h1>イタリアントマト</h1>
   					<p>不言実行館の最上階(6階)にあります。<br>パスタや、デザートが楽しめます</p>
   				</div>
   				<img src="images/4.jpg" width="980" height="700" alt="">
   			</li>
   		</ul>
   	</section>
</div>

<!--(sub)休講情報-->
<div id="pageBodySub">
	<section class="newsList">
		<h2>休講情報について</h2>
    <?php
    error_reporting(0);
    $sample = 'abc';
    echo "<strong>".$sample."</strong>で検索";
    // データベースへ接続
    $dsn = "mysql:dbname=kyukou;host=localhost;port=3306;charset=utf8";
    $user = "root";
    $password = "";
    //$dbInfo = new PDO ( $dsn, $user, $password );
    try {

      // PDOインスタンスを生成
      $dbh = new PDO($dsn, $user, $password);

    // エラー（例外）が発生した時の処理を記述
    } catch (PDOException $e) {

      // エラーメッセージを表示させる
      echo 'データベースにアクセスできません！' . $e->getMessage();
      // 強制終了
      exit;
    }

    // SQL（検索）の実行
    //$sql = "SELECT * FROM class";
    //$stmt = $dbh -> query($sql);
    //foreach ($stmt as $row){
    //  echo $row['class_name'];
    //}
//休講の授業数をカウント
    $i = 0;
    $sql = "SELECT * FROM class WHERE cancel='TRUE'";
    $stmt = $dbh -> query($sql);
    foreach ($stmt as $row){
    //echo $row['class_name'];
      $i += 1;
      }
    echo "<strong>本日の二コマの休講情報が, . '<br>' ". $i . "件あります。</strong>";
    //  $cnt = count($row);
    //  var_dump($cnt);
//切断
　//　$dbh = null;
    ?>
　</section>
</div>

<div id="pageBodyMain">
  <article class="articleDetail">
  			<h1 class="pageTitle">席情報確認表</h1>
　</article>
<!-- 変数宣言-->
<?php
$table1 = 200;
$table2 = 200;
$table3 = 50;
$table4 = 100;
?>

<!-- jsonファイル読み取り-->
<!--test1-->
<?php
$url = "http://localhost:8080/project/php/json/test1.json";

$json = @file_get_contents($url);

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

$arr1 = json_decode($json,true);

$arr1 = json_decode($json);
//echo $arr->test->person;

//if ( $arr->test->person > 25 ) {
//      echo "満席です";
//} else {
//      echo ($arr->test->person) / 25;
//}
?>
<!--test2-->
<?php
$url = "http://localhost:8080/project/php/json/test2.json";

$json = @file_get_contents($url);

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

$arr2 = json_decode($json,true);

$arr2 = json_decode($json);
?>
<!--test3-->
<?php
$url = "http://localhost:8080/project/php/json/test3.json";

$json = @file_get_contents($url);

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

$arr3 = json_decode($json,true);

$arr3 = json_decode($json);
?>
<!--test4-->
<?php
$url = "http://localhost:8080/project/php/json/test4.json";

$json = @file_get_contents($url);

$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

$arr4 = json_decode($json,true);

$arr4 = json_decode($json);
?>
<!--テストまとめ(1~4)-->
<?php
$url = "http://localhost:8080/project/php/json/test.json";

$json = file_get_contents($url);

$json = mb_convert_encoding($json, 'UTF8', 'ASCII','JIS','UTF-8','EUC-JP','SJIS-WIN');

$arr = json_decode($json,true);

$arr = json_decode($json);
?>



 <table border="1" width="100%" height="300">
  <tr>
    <th>食堂</th><th>席数</th><th>人の数</th><th>席状況</th>
  </tr>
  <tr>
    <td>第一食堂</td><td>200</td><td><?php echo "約". $arr->test1->person; ?></td><td><?php if ( $arr->test1->person > $table1 ) {
          echo '<span style="color:#FF0000;">満席です</span>';
    } else {
          echo (($arr->test1->person) / $table1 * 100)."%埋まっています";
    } ?></td>
  </tr>
  <tr>
    <td>第二食堂</td><td>200</td><td><?php echo "約". $arr->test2->person; ?></td><td><?php if ( $arr->test2->person > $table2 ) {
          echo '<span style="color:#FF0000;">満席です</span>';
    } else {
          echo (($arr->test2->person) / $table2 * 100) . "%埋まっています";
    } ?></td>
  </tr>
  <tr>
    <td>第三食堂</td><td>50</td><td><?php echo "約". $arr->test3->person; ?></td><td><?php if ( $arr->test3->person > $table3 ) {
          echo '<span style="color:#FF0000;">満席です</span>';
    } else {
          echo (($arr->test3->person) / $table3 * 100) . "%埋まっています";
    } ?></td>
  </tr>
  <tr>
    <td>イタリアントマト</td><td>100</td><td><?php echo "約". $arr->test4->person; ?></td><td><?php if ( $arr->test4->person > $table4 ) {
          echo '<span style="color:#FF0000;">満席です</span>';
    } else {
          echo (($arr->test4->person) / $table4 * 100) . "%埋まっています";
    } ?></td>
  </tr>
</table>


<div id="pageBodyMain">
  <article class="articleDetail">
  			<h1 class="pageTitle">移動販売もあります！</h1>
　</article>
<p>すべての学食が満席の場合や時間がないときに是非！<br>日替わりで種類が豊富です！</p>
	<p><a href="http://localhost:8080/project/php/pdf/idou6.pdf"> "6月の移動販売のスケジュールはこちら"</a></p>

  <div id="pageBodyMain">
    <article class="articleDetail">
    			<h1 class="pageTitle">今週のランチ</h1>
  　</article>
  <p>中部大学の学食では週替わりでランチのメニューが変わります</p>
<div>
  <img align="left" src="images/1-lunch.jpg"/ width="300" height="220">
  <img align="right" src="images/3-lunch.jpg"/ width="300" height="220">
  <br clear="both">
  <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第一食堂のランチです　　　　　　　　　　　　　　　　　　　　　第三食堂のランチです</p>
</div>
<footer id="pageFoot">
	<p id="copyright"><small>Copyright&copy; 2019 @team_hibiteko All Rights Reserved.</small></p>
</footer>

</body>
</html>
