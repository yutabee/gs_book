<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        body {
            background: #84fab0;
            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }

        .outPutArea {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .image_card {
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
    <?php
    $className = $_GET['class'];
    // var_dump($className);
    // exit();

    // DB接続
    include('functions.php');
    $pdo = connect_to_db();

    // select
    $sql = 'SELECT * FROM image_table WHERE user_class=:class_name';

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':class_name', $className, PDO::PARAM_STR);

    // SQL実行
    try {
        $status = $stmt->execute();
    } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
    }

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // echo '<pre>';
    // var_dump($result);
    // echo '<pre>';
    // exit();

    ?>

    <h1><?= $className ?> BOOK</h1>
    <div id="outPutArea" class="outPutArea"></div>
    <script>
        const json_results = <?= json_encode($result) ?>;
        console.log(json_results);
        let outText = '';
        json_results.map((x) => {
            console.log(x.image_path);
            let ret = x.image_path.replace('../', '');
            outText += `<div class="image_card">
                            <img src="${ret}" style="width:250px;height:200px;">
                            <div class="image_caption_box">
                                <p>title: ${x.image_title}</p>
                                <p>caption: ${x.image_caption}</p>
                            </div>
                        </div>`;
        });
        console.log(outText);
        const outPutArea = document.getElementById('outPutArea');
        outPutArea.innerHTML = outText;
    </script>

</body>

</html>