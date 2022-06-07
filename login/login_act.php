<?php
include('../functions.php');
session_start();
// データ受け取り
// var_dump($_POST);
// exit();


$user_name = $_POST['user_name'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
// username，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM user_table WHERE user_name=:user_name AND password=:password AND is_deleted=0';


$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);


try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// ユーザ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
  echo "<p>ログイン情報に誤りがあります</p>";
  echo "<a href=login_input.php>ログイン</a>";
  exit();
} else {
  $_SESSION = array();
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['user_name'] = $val['user_name'];
  $_SESSION['password'] = $val['password'];
  header("Location:../top.php");
  exit();
}