<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        require "./php/includes/db.php";

        $project_id = $_GET['id'];
        $project = $mysql->query("SELECT * FROM `projects` WHERE `id` = '$project_id'");
        $project = mysqli_fetch_assoc($project);


    
    ?>

    <h2>Название проекта: <?= $project['title'] ?></h2>
    <span>Создатель: <?= $project['creator'] ?></span>
</body>
</html>