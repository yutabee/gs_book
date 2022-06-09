<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/header.css">
  <script src="https://kit.fontawesome.com/ab4f4e9293.js" crossorigin="anonymous"></script>

  <title>User_Search</title>
  <style>
    body {
      background: #84fab0;
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }

    .search-box {
      margin: 100px;
      width: 800px;
      ;
    }

    .user_card {
      background-color: white;
      margin: 20px;
      padding: 10px;
      border-radius: 10px;
      box-shadow: inset black -2px -2px 4px 1px;
    }

    .image_card>img {
      border-radius: 10px;
    }
  </style>
</head>

<body>

  <header>
    <h1>
      <a href="../top.php">G'sBOOK</a>
    </h1>
    <nav class="pc-nav">
      <ul>
        <li> <a href="../top.php">TOP</a></li>
        <li> <a href="../login/user_logout.php">Logout</a></li>
        <li><a href="../login/user_list.php">UserList</a></li>
        <li><a href="../image_register_form/image_register.php" class="fa-solid fa-camera-retro"></a></li>
      </ul>
    </nav>
  </header>

  <div class="search-box">
    <div class="mb-3">
      <label for="search" class="form-label">search</label>
      <input type="text" class="form-control" id="search" placeholder="search">
    </div>
    <div id="outPutArea">
      <div id="outPut_container"></div>
    </div>
  </div>

  <div id="result"></div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script>
    const outPutText = '';
    const outText = '';
    const outPut_container = document.getElementById('outPut_container');

    $("#search").on("keyup", (e) => {
      // console.log(e.target.value);
      const searchWord = e.target.value;
      const requestUrl = "ajax_get.php";

      // ここからhttp通信を行うコード
      axios
        .get(`${requestUrl}?searchword=${searchWord}`)
        .then((res) => {
          const array = [];
          res.data.forEach((x) => {
            array.push(`
                      <div class="user_card">
                        <img src="${x.user_image}" style="width:250px;height:200px;">
                        <div class="user_info">
                          <p>${x.user_name}</p>
                          <p>${x.user_history}</p>
                        </div>
                      </div>           
            `);
          });
          $('#result').html(array);
          console.log(array);
        })
        .catch(function(error) {
          console.log(error);
        });
    }); //#serch keyup の閉じタグ
  </script>
</body>

</html>