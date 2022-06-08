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
          <div class='user-content'>
            <p>{$record['user_name']}</p>
            <p>{$record['user_history']}</p>
            <p><i class='fa-brands fa-twitter'></i>{$record['user_twitter']}</p>
            <p><i class='fa-brands fa-github'></i>{$record['user_github']}</p>
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

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
      /* margin: 60px 0 0 60px; */
      padding: 20px 30px;
      margin-left: 200px;
      margin-top: 60px;
    }

    .userimage {    
      background-color: white;
      text-align: center;
      /* padding: 40px 60px; */
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