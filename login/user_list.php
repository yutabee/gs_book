<?php
include('../functions.php');
session_start();
check_session_id();

// var_dump($_SESSION);
// exit();
$user_id = $_SESSION['id'];

// echo '<pre>';
// var_dump($_SESSION);
// echo '<pre>';
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
// echo '<pre>';
// var_dump($user_id);
// echo '<pre>';
// exit();


$outText = "";
foreach ($result as $record) {
  if ($user_id == $record['id']) {
    $EditButton = "<a href='user_edit.php' class='fa-solid fa-pen-to-square'></a>";
  } else {
    $EditButton = '';
  }

  // echo '<pre>';
  // var_dump($record['id']);
  // echo '<pre>';
  // exit();

  $outText .= "
    <div class='usercard'>
        <div class='userimage'>
          <img src='{$record['user_image']}'>
          <div class='user-content'>
  
            <p>{$record['user_name']}<span> {$EditButton}</span></p>
            <p class='history'>{$record['user_history']}</p>
            <p class='user_field'>{$record['user_field']}</p>
            <p class='user_future'>{$record['user_future']}</p>
            <a class='fa-brands fa-twitter' href='{$record['user_twitter']}'></a>
            <a class='fa-brands fa-github' href='{$record['user_github']}'></a>

          </div>
        </div>
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
  <script src="https://kit.fontawesome.com/ab4f4e9293.js" crossorigin="anonymous"></script>
  <title>Document</title>
  <style>
    body {
      background: #84fab0;
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }

    .container {
      width: 100%;
      display: grid;
      grid-template-columns: repeat(auto-fit,
          minmax(200px, 1fr));
      grid-gap: 10px;
    }

    .usercard {
      width: 30%;
      display: flex;
      justify-content: center;
      display: inline-block;
      padding: 20px 30px;
      margin-left: 200px;
      margin-top: 60px;
    }

    .userimage {
      background-color: white;
      text-align: center;
      border-radius: 20px;
      box-shadow: inset black -2px -2px 4px 1px;
    }

    .user-content {
      padding: 40px;
    }

    img {
      height: 200px;
      border-radius: 50%;
      text-align: center;
      margin: 0 auto;
      padding-top: 20px;
    }

    p {
      font-size: 20px;
      text-align: center;
      font-weight: bold;
    }

    a {
      font-size: 20px;
      color: black;
      padding-left: 10px;
    }

    a:hover {
      color: lightblue;
    }

    .history {
      font-weight: normal;
      word-wrap: break-word;
    }

    .fa-brands {
      padding: 20px;
      font-size: 30px;
      color: black;
    }
  </style>
</head>

<body>
  <div class="container">


    <section id="content">

      <?= $outText ?>

    </section>


    <!-- <button id="modalOpen" class="button">Click Me</button> -->

    <script src="user_list.js"></script>

  </div>
</body>

</html>