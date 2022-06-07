<?php
include('../functions.php');

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// exit();


// !issetで確認
if (
  !isset($_POST['user_name']) || $_POST['user_name'] == '' ||
  !isset($_POST['email']) || $_POST['email'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == '' ||
  !isset($_POST['user_history']) || $_POST['user_history'] == '' ||
  !isset($_POST['user_twitter']) || $_POST['user_twitter'] == '' ||
  !isset($_POST['user_github']) || $_POST['user_github'] == ''

) {
  exit('ParamError');
}

// echo '<pre>';
// var_dump($_FILES);
// echo '<pre>';
// exit();


if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == 0) {
  // 送信が正常に行われたときの処理
  $uploaded_file_name = $_FILES['user_image']['name'];
  $temp_path  = $_FILES['user_image']['tmp_name'];
  $directory_path = '../user_image/';

  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension;
  $save_path = $directory_path . $unique_name;

  // echo '<pre>';
  // var_dump($save_path);
  // echo '<pre>';
  // exit();

  if (is_uploaded_file($temp_path)) {
    if (move_uploaded_file($temp_path, $save_path)) {
      chmod($save_path, 0644);
    } else {
      exit('Error:アップロードできませんでした');
    }
  } else {
    exit('Error:画像がありません');
  }
} else {
  exit('Error:画像が送信されていません');
}


// ＄_POSTできたデータを変数に入れる
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user_history = $_POST['user_history'];
$user_twitter = $_POST['user_twitter'];
$user_github = $_POST['user_github'];


// DB接続
$pdo = connect_to_db();

// sql作成＆実行
$sql = 'INSERT INTO user_table (id, user_name, email, password, is_admin, is_deleted, user_image, user_history, user_twitter, user_github, created_at, updated_at) VALUES (NULL, :user_name, :email, :password, 0, 0, :user_image, :user_history, :user_twitter, :user_github, now(), now())';

$stmt = $pdo->prepare($sql);

// var_dump($save_path);
// exit();

// バインド変数を設定
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':user_image', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':user_history', $user_history, PDO::PARAM_STR);
$stmt->bindValue(':user_twitter', $user_twitter, PDO::PARAM_STR);
$stmt->bindValue(':user_github', $user_github, PDO::PARAM_STR);

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
header('Location:user_register.php');
exit();
