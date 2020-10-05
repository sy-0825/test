<?php
mb_internal_encoding("utf8");
session_start();

//DB接続・try catch文
$pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root",""); 

//プリアードステートメントでSQLをセット
$stmt = $pdo->prepare("update login_mypage set name = ?,
mail = ?, password = ?, comments = ? where id = ?");

//bindValueメソッドでパラメーターをセット
$stmt->bindValue(1,$_POST["name"]);
$stmt->bindValue(2,$_POST["mail"]);
$stmt->bindValue(3,$_POST["password"]);
$stmt->bindValue(4,$_POST["comments"]);
$stmt->bindValue(5,$_POST["id"]);

$stmt->execute();


//preparedステートメント(更新された情報をDBからselect文で取得)SQLをセット
//bindValueメソッドでバラメーターをセット
$stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");
$stmt->bindValue(1,$_POST['mail']);
$stmt->bindValue(2,$_POST['password']);

//executeでクエリを実行
$stmt->execute();

//DBを切断
$pdo = NULL;

//fetch・while文でデータ取得し、sessionに代入
while($row=$stmt->fetch()){
    $_SESSION['id']=$row['id'];
    $_SESSION['name']=$row['name'];
    $_SESSION['mail']=$row['mail'];
    $_SESSION['password']=$row['password'];
    $_SESSION['picture']=$row['picture'];
    $_SESSION['comments']=$row['comments'];
}


//mypage.phpにリダイレクト
header('Location:mypage.php');

?>