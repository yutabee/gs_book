<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
  <style>
    .gradient-custom-3 {
      /* fallback for old browsers */
      background: #84fab0;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
    }

    .gradient-custom-4 {
      /* fallback for old browsers */
      background: #84fab0;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }

    button {
      box-shadow: 0 7px darkgrey;
    }

    button:active {
      position: relative;
      top: 7px;
      box-shadow: none;
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
                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                <form action="user_register_act.php" method="POST" enctype="multipart/form-data">

                  <div class="form-outline mb-4">
                    <input type="text" id="user_name" class="form-control form-control-lg" name="user_name" />
                    <label class="form-label" for="user_name">Your Name</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="email" id="email" class="form-control form-control-lg" name="email" />
                    <label class="form-label" for="email">Your Email</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" class="form-control form-control-lg" name="password" />
                    <label class="form-label" for="password">Password</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="file" name="user_image" accept="image/*" capture="camera" id="user_image" class="form-control form-control-lg" />
                    <label class="form-label" for="user_image">Your Image</label>
                  </div>


                  <div class="form-outline mb-4">
                    <select name="user_class" id="user_class" class="form-control form-control-lg">
                      <option value="NONE">????????????????????????</option>
                      <option value="LAB01">LAB01</option>
                      <option value="LAB02">LAB02</option>
                      <option value="LAB03">LAB03</option>
                      <option value="LAB04">LAB04</option>
                      <option value="LAB05">LAB05</option>
                      <option value="LAB06">LAB06</option>
                      <option value="LAB07">LAB07</option>
                      <option value="DEV01">DEV01</option>
                      <option value="DEV02">DEV02</option>
                      <option value="DEV03">DEV03</option>
                      <option value="DEV04">DEV04</option>
                      <option value="DEV05">DEV05</option>
                      <option value="DEV06">DEV06</option>
                      <option value="DEV07">DEV07</option>
                      <option value="DEV08">DEV08</option>
                      <option value="DEV09">DEV09</option>
                      <option value="DEV10">DEV10</option>
                      <option value="DEV11">DEV11</option>
                    </select>
                    <label class="form-label" for="user_class">class</label>
                  </div>


                  <div class="form-outline mb-4">
                    <textarea id="user_history" class="form-control form-control-lg" name="user_history"></textarea>
                    <label class="form-label" for="user_history">History</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="URL" id="user_twitter" class="form-control form-control-lg" name="user_twitter" />
                    <label class="form-label" for="user_twitter">Twitter</label>
                  </div>


                  <div class="form-outline mb-4">
                    <input type="URL" id="user_github" class="form-control form-control-lg" name="user_github" />
                    <label class="form-label" for="user_github">GitHub</label>
                  </div>





                  <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">create</button>
                  </div>

                  <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login_input.php" class="fw-bold text-body"><u>Login here</u></a></p>

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