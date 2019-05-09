<?php 
$pdo = new PDO("mysql:host=localhost:3306;dbname=sportify","root","");




if (isset($_POST["submit"])) {
   var_dump($_FILES["image"]);
   $image = $_FILES['image']['name'];
   var_dump($image);
   $var = 'upload/'. $image;
   move_uploaded_file($_FILES['image']['tmp_name'], $var);
   $statement = $pdo->prepare(
    "INSERT INTO img (images) 
    VALUES(:images)"
    );
    $statement->execute(array(':images' => $var));

    $stm = $pdo->query(
        "SELECT * FROM img"
        );
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit">
    </form>
    <img src=<?= $result[6]['images'] ?> alt="" srcset="">
</body>
</html>