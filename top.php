<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/user.css">
  <title>Document</title>
  <style>
    .outbox {
      margin: 10px;
    }

    body {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      /* fallback for old browsers */
      background: #84fab0;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
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
  <div class="outbox">
    <h1>TOP</h1>
    <div class="container">
      <P><span>Hello!</span><?= "{$_SESSION['user_name']}" ?>さん!</P>
      <a href="login/user_logout.php">Logout</a>
      <a href="user_login_read.php">List</a>
      <div class='photo_submit_button'><a href="image_register_form/image_register.php">写真を投稿する</a></div>
    </div>
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