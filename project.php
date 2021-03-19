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
        require "php/includes/db.php";
        $id = $_GET['id'];
        $project = R::load('projects', $id);

    ?>

    <h2>Название проекта: <?= $project['title'] ?></h2>
    <span>Создатель: <?= $project['creator_name'] ?></span>

    <?php if ($_COOKIE['id'] == $project['creator_id']): ?>
        <a href="update_objects.php?id=<?= $project->id?>">Update data</a>
        <a href="php/delete.php?id=<?= $project->id?>">Delete data</a>
    <?php else: ?>
    <?php endif; ?>

</body>
</html>