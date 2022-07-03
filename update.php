<?php

//1. POSTデータ取得
$id = $_POST["id"];
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
include("funcs.php");  //funcs.phpを読み込む（関数群）
$pdo = db_conn();      //DB接続関数


//３．データ登録SQL作成
// $stmt = $pdo->prepare("insert into gs_testdrive_0621(model, date, family_name, given_name, phonenumber, email, postal_code, contact_way, owned_car, owned_car_model, indate) 
$sql = "update gs_testdrive_0627 set model=:model, date=:date, family_name=:family_name, given_name=:given_name, phonenumber=:phonenumber, email=:email, postal_code=:postal_code, contact_way=:contact_way, owned_car=:owned_car, owned_car_model=:owned_car_model where id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':id', $id, PDO::PARAM_INT);  
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
    sql_error($stmt);
}else{
    redirect("select.php");
}
?>

