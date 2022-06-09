<?php
include('../functions.php');
session_start();

// echo '<pre>';
// var_dump($_SESSION);
// echo '<pre>';
// exit();

$user_id = $_SESSION['id'];
// var_dump($user_id);
// exit();
$pdo = connect_to_db();

$sql = 'SELECT * FROM user_table where id=:user_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// $stmt->bindValue(':user_field', $user_field, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


$user_name = $result[0]["user_name"];
$user_field = $result[0]["user_field"];
$user_history = $result[0]["user_history"];
$user_future = $result[0]["user_future"];
// echo '<pre>';
// var_dump($user_name, $user_field, $user_history, $user_future);
// echo '<pre>';
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
  <style>
    body {
      background: #84fab0;
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }

    .gradient-custom-4 {
      /* fallback for old browsers */
      background: #84fab0;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
  </style>
</head>

<body>
  <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">Profile</h2>

                <form action="user_edit_act.php" method="POST" enctype="multipart/form-data">


                  <div class="form-outline mb-4">
                    <input value="<?= $user_name ?>" type="text" id="user_name" class="form-control form-control-lg" name="user_name" />
                    <label class="form-label" for="user_name">名前</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input value="<?= $user_field ?>" type="text" id="user_field" class="form-control form-control-lg" name="user_field" />
                    <label class="form-label" for="user_field">得意、好きな言語</label>
                  </div>



                  <div class="form-outline mb-4">
                    <textarea id="user_history" class="form-control form-control-lg" name="user_history"><?= $user_history ?></textarea>
                    <label class="form-label" for="user_history">経歴</label>
                  </div>


                  <div class="form-outline mb-4">
                    <textarea id="user_future" class="form-control form-control-lg" name="user_future"><?= $user_future ?></textarea>
                    <label class="form-label" for="user_future">進路</label>
                  </div>




                  <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">編集</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0"><a href="user_list.php" class="fw-bold text-body"><u>LIST</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>