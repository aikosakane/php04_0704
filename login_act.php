<?php
//最初にSESSIONを開始！！ココ大事！！
session_start();

//POST値
$email = $_POST["email"];
$phonenumber = $_POST["phonenumber"];


//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//2. データ登録SQL作成
//* PasswordがHash化→条件はlidのみ！！lid, lpwが一致するユーザーを取ってきて
// $stmt = $pdo->prepare("**********");
// $stmt = $pdo->prepare("select * from gs_user_table where lid = :lid and lpw = :lpw"); 
// $stmt = $pdo->prepare("select * from gs_user_table where lid = :lid"); 
$stmt = $pdo->prepare("select * from gs_testdrive_0627 where email = :email"); 
// $stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// $stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$status = $stmt->execute();

//3. SQL実行時にエラーがある場合STOP
if($status==false){
    sql_error($stmt);
}

//4. 抽出データ数を取得
$val = $stmt->fetch();         //1レコードだけ取得する方法
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()


//5.該当１レコードがあればSESSIONに値を代入
//入力したPasswordと暗号化されたPasswordを比較！[戻り値：true,false]
$phonenumber = password_verify($phonenumber, $val["phonenumber"]);
// if( $val["id"] != "" ){ 
if( $phonenumber ){ 

  //Login成功時
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["kanri_flg"] = $val['kanri_flg'];
  $_SESSION["name"]      = $val['name'];
  //Login成功時（リダイレクト）
  redirect("select.php");

}else{
  //Login失敗時(Logoutを経由：リダイレクト)
  redirect("login.php");
}

exit();


