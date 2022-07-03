<?php
//１．PHP
//※SQLとデータ取得の箇所を修正します。
$id = $_GET["id"];

//////////select.phpの[PHPコードだけ！]をマルっとコピー + 必要なとこだけ修正//////////
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数

//２．データ登録SQL作成
// $stmt   = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id"); //SQLをセット
$stmt   = $pdo->prepare("SELECT * FROM gs_testdrive_0627 WHERE id=:id"); //SQLをセット
$stmt->bindValue(':id',   $id,    PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //SQLを実行→エラーの場合falseを$statusに代入

//３．データ表示
$view=""; //HTML文字列作り、入れる変数
if($status==false) {
  //SQLエラーの場合
  sql_error($stmt);
}else{
  //SQL成功の場合
  $row = $stmt -> fetch(); //1つのデータを取り出して $row に格納
  // var_dump($row);
}

?>


<html>
<head>
<meta charset="utf-8">
<title>試乗予約 (修正)</title>
<link rel="icon" href="img/favicon.ico">
<link rel="stylesheet" href="css/style1.css">
</head>

<body>
<div class="navigation">
	<a href="index.php"><img src="./img/logo.png" class="logo" alt="logo" height="10%"></a>
</div>

<h1>予約内容修正</h1>
<h2>
	フォーム上で修正ください (<font color="red"><font color="red">*</font></font><font color="white">必須項目</font>)
</h2>


<!-- Head[End] -->

<!-- Main[Start] -->
<!-- <form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>名前：<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$row["age"]?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row["naiyou"]?></textArea></label><br>
     <!-- idを隠して送信 -->
     <!-- <input type="hidden" name="id" value="<?=$row["id"]?>"> -->
     <!-- idを隠して送信 -->
     <!-- <input type="submit" value="送信"> -->
    <!-- </fieldset> -->
  <!-- </div> -->
<!-- </form> -->
<!-- Main[End] -->


<table class="formTable">
<th>項目</th><th>入力内容</th>
<form action="update.php" method="post">

	<tr><td>試乗モデル<font color="red">*</font></td>
	<td><select name="model" value="<?=$row["model"]?>" required>    <!-- モデルが反映されない！！！！ -->
		<option hidden>モデルを選択</option>	<!-- 初期値設定できる -->
		<option value="アウトランダーPHEV">アウトランダーPHEV</option>
		<option value="エクリプスクロスPHEV">エクリプスクロスPHEV</option>
		<option value="エクリプスクロス">エクリプスクロス</option>
		<option value="RVR">RVR</option>
		<option value="デリカD5">デリカD5</option>
		<option value="デリカD2">デリカD2</option>
		<option value="ミラージュ">ミラージュ</option>
		<option value="eKクロスEV">eKクロスEV</option>
		<option value="eKクロス">eKクロス</option>
		<option value="eKワゴン">eKワゴン</option>
		<option value="eKクロス スペース">eKクロス スペース</option>
		<option value="eKスペース">eKスペース</option>
	</select></td></tr>

	<tr><td>試乗希望日<font color="red"><font color="red">*</font></font></td>
	<td><input type="date" name="date" min="2022-04-01" max="3000-12-31" value="<?=$row["date"]?>" required></td></tr>
	
	<tr><td>お名前<font color="red">*</font></td>
	<td><input type="text" name="family_name" placeholder="姓" value="<?=$row["family_name"]?>" required>
	<input type="text" name="given_name" placeholder="名" value="<?=$row["given_name"]?>" required></td></tr>
	
	<tr><td>電話番号<font color="red">*</font></td>
	<td><input type="tel" name="phonenumber" required maxlength="11" minlength="10" value="<?=$row["phonenumber"]?>"></td></tr>
	
	<tr><td>Email<font color="red">*</font></td>
	<td><input type="email" name="email" value="<?=$row["email"]?>" required></td></tr>
	
	<tr><td>郵便番号<font color="red"><font color="red">*</font></font></td>
	<td><input type="postal-code" name="postal_code" required maxlength="7" minlength="7" value="<?=$row["postal_code"]?>"></td></tr>

	<tr><td>ご連絡方法<font color="red"><font color="red">*</font></font></td>  <!-- モデルが反映されない！！！！ -->
	<td>	<!-- name="contactWay"を全選択肢につけることでグループ化され1つしか選択できないようになる、グループ内の1つにこの属性を指定すると、そのグループが入力必須なる -->
		<input type="radio" name="contact_way" value="電話" required>電話</input>
		<input type="radio" name="contact_way" value="メール">メール</input>
		<input type="radio" name="contact_way" value="どちらでもよい">どちらでもよい</input>
	</td></tr>
	<tr><td>お持ちの車について</td>
	<td><input type="text" name="owned_car" placeholder="メーカー名" value="<?=$row["owned_car"]?>">
	<input type="text" name="owned_car_model" placeholder="モデル名" value="<?=$row["owned_car_model"]?>"></td></tr>

  <!-- idを隠して送信 -->
  <input type="hidden" name="id" value="<?=$row["id"]?>">
  <!-- /idを隠して送信 -->
	<tr><td><input type="submit" id="submit" value="申請"></td></tr>

</form>
</body>
</html>




