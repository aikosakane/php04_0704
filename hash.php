<?php
//PASSWORD_DEFAULT=どういう方式でハッシュ化するか
$phonenumber = password_hash("test1", PASSWORD_DEFAULT);
echo $phonenumber;
// var_dump(password_verify("test1", $pw));