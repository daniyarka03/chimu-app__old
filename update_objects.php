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

    <h2>Изменение объекта: <?= $project['title'] ?></h2>
    <form action="./php/update_object.php" method="post">
        <input type="hidden" name="id" value="<?= $project_id?>"/>
        <div class="form-block">
            <span></span>
            <input type="text" placeholder="Название" name="title_object" value="<?= $project['title'] ?>">
        </div>
        <div class="form-block">
            <input type="submit" value="Изменить">
        </div>
    </form>
</body>
</html>