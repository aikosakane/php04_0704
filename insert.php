<!-- sakuraにあげる時変更要 -->
<?php

ini_set('display_errors', 'On');  // エラーを表示させるようにしてください
error_reporting(E_ALL);           // 全てのレベルのエラーを表示してください

//1. POSTデータ取得
$model = $_POST["model"];
$date = $_POST["date"];
$familyName = $_POST["family_name"];
$givenName = $_POST["given_name"];
$phonenumber = $_POST["phonenumber"];
$email = $_POST["email"];
$postalCode = $_POST["postal_code"];
$contactWay = $_POST["contact_way"];
$ownedCar = $_POST["owned_car"];
$ownedCarModel = $_POST["owned_car_model"];

//2. DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  // $pdo = new PDO('mysql:dbname=dbxxxx;charset=utf8;host=xxxx.sakura.ne.jp', 'IDxxxx', 'PWxxx'); 
  $pdo = new PDO('mysql:dbname=mil-sakane_gstestdrive0627;charset=utf8;host=mysql57.mil-sakane.sakura.ne.jp', 'mil-sakane', 'aikokoko42_'); 
  // $pdo = new PDO('mysql:dbname=gs_testdrive;charset=utf8;host=localhost','root','');  //db名怪しい？
  // $pdo = new PDO('mysql:dbname=ユーザー名_DB名;charset=utf8;host=URL', 'ユーザー名', 'パスワード'); 
} catch (PDOException $e) {   //tryしエラーがでたら｛以下を表示して
  exit('DBconnection Error:'.$e->getMessage());
}


//３．データ登録SQL作成
// $stmt = $pdo->prepare("insert into gs_testdrive_0621(model, date, family_name, given_name, phonenumber, email, postal_code, contact_way, owned_car, owned_car_model, indate) 
$stmt = $pdo->prepare("insert into gs_testdrive_0627(model, date, family_name, given_name, phonenumber, email, postal_code, contact_way, owned_car, owned_car_model, indate) 
    values(:model, :date, :family_name, :given_name, :phonenumber, :email, :postal_code, :contact_way, :owned_car, :owned_car_model, sysdate())");
$stmt->bindValue(':model', $model, PDO::PARAM_STR);  
$stmt->bindValue(':date', $date, PDO::PARAM_STR);  
$stmt->bindValue(':family_name', $familyName, PDO::PARAM_STR);  
$stmt->bindValue(':given_name', $givenName, PDO::PARAM_STR);  
$stmt->bindValue(':phonenumber', $phonenumber, PDO::PARAM_STR);  //数字はINTだが先頭の0が消えてしまうのでSTR
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  
$stmt->bindValue(':postal_code', $postalCode, PDO::PARAM_INT);
$stmt->bindValue(':contact_way', $contactWay, PDO::PARAM_STR);
$stmt->bindValue(':owned_car', $ownedCar, PDO::PARAM_STR);
$stmt->bindValue(':owned_car_model', $ownedCarModel, PDO::PARAM_STR);
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQL_ERROR:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: complete.php");
  exit();
}
?>