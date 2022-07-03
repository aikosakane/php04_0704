<!-- sakuraにあげる時変更要 -->

<?php
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str){
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続関数：db_conn()
function db_conn(){
    try {
        //localhostの場合
        // $db_name = "gs_testdrive";    //データベース名
        // $db_id   = "root";      //アカウント名
        // $db_pw   = "";          //パスワード：XAMPPはパスワード無しに修正してください。
        // $db_host = "localhost"; //DBホスト

        //localhost以外＊＊自分で書き直してください！！＊＊
        $pdo = new PDO('mysql:dbname=mil-sakane_gstestdrive0627;charset=utf8;host=mysql57.mil-sakane.sakura.ne.jp', 'mil-sakane', 'aikokoko42_'); 
        if($_SERVER["HTTP_HOST"] != 'localhost'){
            $db_name = "mil-sakane_gstestdrive0627";  //データベース名
            $db_id   = "mil-sakane";  //アカウント名（さくらコントロールパネルに表示されています）
            $db_pw   = "aikokoko42_";  //パスワード(さくらサーバー最初にDB作成する際に設定したパスワード)
            $db_host = "mysql57.mil-sakane.sakura.ne.jp"; //例）mysql**db.ne.jp...
        }
        return new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
    } catch (PDOException $e) {
        exit('DB Connection Error:'.$e->getMessage());
    }
}

//SQLエラー関数：sql_error($stmt)
function sql_error($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}


//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    header("Location: ".$file_name);
    exit();
}




