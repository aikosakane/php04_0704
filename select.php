<!-- sakuraにあげる時変更要 -->

<?php
	//1.  DB接続します
	try {
		//Password:MAMP='root',XAMPP=''
		$pdo = new PDO('mysql:dbname=xxx;charset=utf8;host=xxx', 'xxx', 'xxx'); 
		// $pdo = new PDO('mysql:dbname=gs_testdrive;charset=utf8;host=localhost','root','');  //localhostの場合
		// $pdo = new PDO('mysql:dbname=ユーザー名_DB名;charset=utf8;host=URL', 'ユーザー名', 'パスワード'); 
	} catch (PDOException $e) {   //tryしエラーがでたら｛以下を表示して
		exit('DBconnection Error:'.$e->getMessage());
	}

	//２．データ取得SQL作成
	$stmt = $pdo->prepare("SELECT * FROM gs_testdrive_0627");
	$status = $stmt->execute();   //実行後エラーか成功か出す
?>

<html>
<head>
<meta charset="utf-8">
<title>申請内容</title>
<link rel="icon" href="img/favicon.ico">
<link rel="stylesheet" href="css/style3.css">
</head>

<body>
	<div class="navigation">
		<a href="index.php"><img src="./img/logo.png" class="logo" alt="logo" height="10%"></a>
	</div>
	<h1>申請内容</h1>

	<table>
		<tr>
			<th>ID</th>
			<th>申請日時</th>
			<th>試乗モデル</th>
			<th>試乗希望日</th>
			<th>お名前</th>
			<th>電話番号</th>
			<th>メールアドレス</th>
			<th>郵便番号</th>
			<th>連絡方法</th>
			<th>お持ちの車(メーカー)</th>
			<th>お持ちの車(モデル)</th>
			<th>修正</th>
			<th>削除</th>
		</tr>

		<?php
			$view= array();
			if($status==false) {
				//execute（SQL実行時にエラーがある場合）
				$error = $stmt->errorInfo();
				exit("SQLerror:".$error[2]);
			}else{
				//Selectデータの数だけ自動でループしてくれる
				//FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
				while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){	//データが存在する限り
					// $view =  [$res["id"], $res["indate"], $res["model"], $res["date"], $res["family_name"], $res["given_name"], $res["phonenumber"], $res["email"], $res["postal_code"], $res["contact_way"], $res["owned_car"], $res["owned_car_model"]];
					$view =  [$res["id"], $res["indate"], $res["model"], $res["date"], $res["family_name"], $res["given_name"], $res["phonenumber"], $res["email"], $res["postal_code"], $res["contact_way"], $res["owned_car"], $res["owned_car_model"]];
					echo '<tr>';
					echo '<td>'.$view[0].'</td>';
					echo '<td>'.$view[1].'</td>';
					echo '<td>'.$view[2].'</td>';
					echo '<td>'.$view[3].'</td>';
					echo '<td>'.$view[4].$view[5].'</td>';
					echo '<td>'.$view[6].'</td>';
					echo '<td>'.$view[7].'</td>';
					echo '<td>'.$view[8].'</td>';
					echo '<td>'.$view[9].'</td>';
					echo '<td>'.$view[10].'</td>';
					echo '<td>'.$view[11].'</td>';
					echo '<td><a href="detail.php?id='.$view[0].'"><font color="white">修正</font></a></td>';		//add消す			
					echo '<td><a href="delete.php?id='.$view[0].'"><font color="white">削除</font></a></td>';
					// echo '<td><a href="delete.php?id='.$view[0].'"><img src="./img/ei-trash.png" class="trashBox" alt="logo" height="30px"></a></td>';
					echo '</tr>';
				}
			}
		?>
	</table>
	<a id="logout" href="logout.php" value="logout">LOGOUT</a>
</body>
</html>
