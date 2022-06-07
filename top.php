<?php
include("functions.php");
session_start();
check_session_id();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/user.css">
  <title>Document</title>
</head>

<body>
  <h1>TOP</h1>
  <div class="container">
    <P><span>Hello!</span><?= "{$_SESSION['user_name']}" ?>さん!</P>
    <a href="login/user_logout.php">Logout</a>
    <a href="user_list.php">List</a>

  </div>
  
</body>

</html>