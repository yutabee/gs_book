<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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

    echo '<pre>';
    var_dump($result);
    echo '<pre>';
    exit();

    ?>
    <h1>readページです。</h1>


</body>

</html>