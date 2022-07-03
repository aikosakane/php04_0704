<html>
<head>
<meta charset="utf-8">
<title>試乗予約</title>
<link rel="icon" href="img/favicon.ico">
<link rel="stylesheet" href="css/style1.css">
</head>

<body>
<div class="navigation">
	<a href="index.php"><img src="./img/logo.png" class="logo" alt="logo" height="10%"></a>
</div>

<h1>試乗予約</h1>
<h2>
	フォームに入力ください (<font color="red"><font color="red">*</font></font><font color="white">必須項目</font>)
</h2>

<table class="formTable">
<th>項目</th><th>入力内容</th>
<form action="insert.php" method="post">

	<tr><td>試乗モデル<font color="red">*</font></td>
	<td><select name="model" required>
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
	<td><input type="date" name="date" min="2022-04-01" max="3000-12-31" required></td></tr>
	
	<tr><td>お名前<font color="red">*</font></td>
	<td><input type="text" name="family_name" placeholder="姓" required>
	<input type="text" name="given_name" placeholder="名" required></td></tr>
	
	<tr><td>電話番号<font color="red">*</font></td>
	<td><input type="tel" name="phonenumber" required maxlength="11" minlength="10"></td></tr>
	
	<tr><td>Email<font color="red">*</font></td>
	<td><input type="email" name="email" required></td></tr>
	
	<tr><td>郵便番号<font color="red"><font color="red">*</font></font></td>
	<td><input type="postal-code" name="postal_code" required maxlength="7" minlength="7"></td></tr>

	<tr><td>ご連絡方法<font color="red"><font color="red">*</font></font></td>
	<td>	<!-- name="contactWay"を全選択肢につけることでグループ化され1つしか選択できないようになる、グループ内の1つにこの属性を指定すると、そのグループが入力必須なる -->
		<input type="radio" name="contact_way" value="電話" required>電話</input>
		<input type="radio" name="contact_way" value="メール">メール</input>
		<input type="radio" name="contact_way" value="どちらでもよい">どちらでもよい</input>
	</td></tr>
	<tr><td>お持ちの車について</td>
	<td><input type="text" name="owned_car" placeholder="メーカー名">
	<input type="text" name="owned_car_model" placeholder="モデル名"></td></tr>
	<tr><td><input type="submit" id="submit" value="申請"></td></tr>
</form>
</table>	
</body>
</html>