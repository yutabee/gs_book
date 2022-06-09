<?php
include('../functions.php');
session_start();
// check_session_id();
// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// exit();


// echo '<pre>';
// var_dump($_SESSION);
// echo '<pre>';
// exit();

// 送信が正常に行われたときの処理
// $uploaded_file_name = $_FILES['user_image']['name'];
// $temp_path  = $_FILES['user_image']['tmp_name'];
// $directory_path = '../user_image/';

// $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
// $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension;
// $save_path = $directory_path . $unique_name;

// echo '<pre>';
// var_dump($save_path);
// echo '<pre>';
// exit();

// if (is_uploaded_file($temp_path)) {
//   if (move_uploaded_file($temp_path, $save_path)) {
//     chmod($save_path, 0644);
//   }
// }

$user_id = $_SESSION['id'];
$user_name = $_POST['user_name'];
$user_history = $_POST['user_history'];
$user_field = $_POST['user_field'];
$user_future = $_POST['user_future'];
// $user_id_str = strval($user_id);

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// exit();

$pdo = connect_to_db();

// sql作成＆実行
$sql = "UPDATE user_table SET user_name=:user_name, user_history=:user_history, user_field=:user_field, user_future=:user_future WHERE id=:user_id";

$stmt = $pdo->prepare($sql);

// var_dump($save_path);
// exit();


// バインド変数を設定
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':user_field', $user_field, PDO::PARAM_STR);
$stmt->bindValue(':user_history', $user_history, PDO::PARAM_STR);
$stmt->bindValue(':user_future', $user_future, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


// var_dump($stmt);
// exit();

// =============TEST中ーーーできたらTOPにつなぐ
header('Location:user_list.php');
exit();
