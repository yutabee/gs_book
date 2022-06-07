<?php
include('../functions.php');
session_start();
check_session_id();

// var_dump($_SESSION);
// exit();

$pdo = connect_to_db();

$sql = 'SELECT * FROM user_table';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// var_dump($result);
// exit();


$outText = "";
foreach ($result as $record) {
 $outText .= "
  <div class='usercard'>
      <div class='userimage'>
        <img src='{$record['user_image']}'>
      </div>
      <p>{$record['user_name']}</p>
      <p></p>
      <p></p>
      <p></p>
    </div>
 ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    li {
      list-style: none;
    }
    #content .content-list ul {
      display: flex;
      
    }

    #content .content-list li {
      margin: 0 40px;    
    }
    
  </style>
</head>
<body>
  <div class="container">


    <section id="content">
      <?= $outText ?>
      
    </section>
  </div>
</body>
</html>