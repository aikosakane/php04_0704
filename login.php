<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style4.css">
<link rel="icon" href="img/favicon.ico">
<title>ログイン</title>
</head>
<body>
  <div class="navigation">
    <a href="index.php"><img src="./img/logo.png" class="logo" alt="logo" height="100px"></a>
  </div>
  <h1>LOGIN</h1>
  <h2>
	  ID/パスワードを入力ください
  </h2>

  <!-- lLOGINogin_act.php は認証処理用のPHPです。 -->
  <form name="form1" action="login_act.php" method="post">
    <font color="black">ID: </font><input type="email" placeholder="メールアドレス" name="email" /> <br><br>
    <font color="black">PW: </font><input type="password" placeholder="電話番号" name="phonenumber" /><br><br><br>
    <input type="submit" id="submit" value="LOGIN" />
  </form>
</body>
</html>