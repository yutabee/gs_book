<?php
//セッションidの確認
session_start();
include("../functions.php");
check_session_id();

// echo '<pre>';
// var_dump($_SESSION);
// echo '<pre>';
// exit();

//入力値のチェック
if (
  !isset($_POST['image_title']) || $_POST['image_title'] == '' ||
  !isset($_POST['image_caption']) || $_POST['image_caption'] == ''

) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$image_title = $_POST['image_title'];
$image_caption = $_POST['image_caption'];
$user_class = $_SESSION['user_class'];
$user_id = $_SESSION['id'];

// echo '<pre>';
// var_dump($_POST);
// echo '<pre>';
// exit();

if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // 送信が正常に行われたときの処理
  $uploaded_file_name = $_FILES['upfile']['name'];
  $temp_path  = $_FILES['upfile']['tmp_name'];
  $directory_path = '../upload/';

  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis') . md5(session_id()) . '.' . $extension;
  $save_path = $directory_path . $unique_name;

  if (is_uploaded_file($temp_path)) {
    if (move_uploaded_file($temp_path, $save_path)) {
      chmod($save_path, 0644); // 所有者に読み込み、書き込みの権限を与え、その他には読み込みだけ許可する。
    } else {
      exit('Error:アップロードできませんでした');
    }
  } else {
    exit('Error:画像がありません');
  }
} else {
  exit('Error:画像が送信されていません');
}

$pdo = connect_to_db();
$sql = 'INSERT INTO image_table(id, user_id, user_class, image_title, image_caption, image_path, created_at) VALUES(NULL, :user_id, :user_class, :image_title, :image_caption , :image_path, now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':user_class', $user_class, PDO::PARAM_STR);
$stmt->bindValue(':image_title', $image_title, PDO::PARAM_STR);
$stmt->bindValue(':image_caption', $image_caption, PDO::PARAM_STR);
$stmt->bindValue(':image_path', $save_path, PDO::PARAM_STR);

// echo '<pre>';
// var_dump($save_path);
// echo '<pre>';
// exit();

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:image_register.php");
exit();
