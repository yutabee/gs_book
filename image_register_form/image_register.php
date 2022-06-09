<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ab4f4e9293.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <style>
        body {
            background: #84fab0;
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }

        .btn {
            background: #84fab0;
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>
    <title>Document</title>
</head>

<body>
    <script>
        function previewImage(obj) {
            let fileReader = new FileReader();
            fileReader.onload = (() => {
                document.getElementById('preview').src = fileReader.result;
            });
            fileReader.readAsDataURL(obj.files[0]);
        }
    </script>

    <header>
        <h1>
            <a href="../top.php">G'sBOOK</a>
        </h1>
        <nav class="pc-nav">
            <ul>
                <li> <a href="../top.php">TOP</a></li>
                <li> <a href="../login/user_logout.php">Logout</a></li>
                <li><a href="../login/user_list.php">UserList</a></li>
                <li><a href="image_register_form/image_register.php" class="fa-solid fa-camera-retro"></a></li>
            </ul>
        </nav>
    </header>

    <section class="vh-100 bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h1 class="text-uppercase text-center mb-5" style="color:black;">POST</h1>
                                <form action="image_upload.php" method="POST" enctype="multipart/form-data">

                                    <div class="form-outline mb-4">
                                        <input type="text" id="image_title" class="form-control form-control-lg" name="image_title" />
                                        <label class="form-label" for="image_title">title</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <textarea type="text" id="image_caption" class="form-control form-control-lg" name="image_caption"></textarea>
                                        <label class="form-label" for="image_caption">caption</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="file" id="upfile" accept="image/*" onchange="previewImage(this)" class="form-control form-control-lg" name="upfile" />
                                        <label class="form-label" for="upfile">image upload</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="preview">preview</label>
                                        <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;margin-left:20%;border:1px solid black;">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">submit</button>
                                    </div>

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