<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ab4f4e9293.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/user.css">
  <link rel="stylesheet" href="css/header.css">
  <title>TOP</title>
  <style>
    .outbox {
      margin: 40px 10px 10px 10px;
      padding-bottom: 80px;
      padding-top: 80px;
    }

    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: #84fab0;
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }

    .class_box_container {
      padding-top: 20px;
      width: 100%;
      display: grid;
      grid-template-columns: repeat(auto-fit,
          minmax(200px, 1fr));
      grid-gap: 10px;
    }

    .classCard {
      background-color: white;
      margin: 20px;
      border-radius: 10%;
      box-shadow: inset black -2px -2px 4px 1px;
    }

    .classCard:hover {
      cursor: pointer;
      background-color: lightblue;
    }

    .classCard>a {
      display: inline-block;
      padding: 30px;
      color: black;
      text-decoration: none;
      font-weight: bold;
    }

    .class_list_box {
      display: flex;
      flex-wrap: wrap;
      text-align: center;
    }
  </style>
</head>

<body>
  <?php
  include("functions.php");
  session_start();
  check_session_id();

  // echo '<pre>';
  // var_dump($_SESSION);
  // echo '<pre>';
  // exit();

  $user_class = $_SESSION['user_class'];

  ?>
  <header>
    <h1>
      <a href="top.php">G'sBOOK</a>
    </h1>
    <nav class="pc-nav">
      <ul>
        <li> <a href="top.php">TOP</a></li>
        <li> <a href="login/user_logout.php">Logout</a></li>
        <li><a href="login/user_list.php">UserList</a></li>
        <li><a href="image_register_form/image_register.php" class="fa-solid fa-camera-retro"></a></li>
      </ul>
    </nav>
  </header>


  <div class="outbox">
    <div id="ClassBox">
      <h2>LAB</h2>
      <div class="class_box_container">
        <div id="LabClassList" class="class_list_box"></div>
      </div>
      <h2>DEV</h2>
      <div class="class_box_container">
        <div id="DevClassList" class="class_list_box"></div>
      </div>
    </div>
  </div>

  <script>
    let LabOutText = "";
    const LabClassArray = [...Array(16).keys()].map((x) => {
      const y = x + 1;
      const z = ("0" + y).slice(-2);
      LabOutText +=
        `<div class='classCard'><a href="album_read.php?class=LAB${z}">LAB${z}</a></div>`;
    });
    const LabClassList = document.getElementById('LabClassList');
    LabClassList.innerHTML = LabOutText;

    let DevOutText = "";
    const classArray = [...Array(16).keys()].map((x) => {
      const y = x + 1;
      const z = ("0" + y).slice(-2);
      DevOutText +=
        `<div class='classCard'><a href="album_read.php?class=DEV${z}">DEV${z}</a></div>`;
    });
    const DevClassList = document.getElementById('DevClassList');
    DevClassList.innerHTML = DevOutText;
  </script>
</body>

</html>