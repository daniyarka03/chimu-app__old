<?php
    try {
        require "php/includes/db.php";

        if(isset($_GET['type'])) {
            $type = $_GET['type'];
        } else {
            $type = 'id';
        }

        if(isset($_GET['sort'])) {
            $status = $_GET['sort'];
        } else {
            $status = 'DESC';
        }

        $projects = R::findAll('projects', ('ORDER BY ' . $type . ' ' . $status));
        $id = $_COOKIE['id'];

        $status == 'DESC' ? $status = 'ASC' : $status = 'DESC';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div {
            width: 400px;
            min-height: 80px;
            height: auto;
            background-color: #c4c4c4;
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <a href="add_objects.php"><button>Add object</button></a>
    <a href="index.php"><button>Main menu</button></a><br /> <br>
    <a href='?type=id&&sort=<?=$status?>'><input type="submit" value="Сортировка по дате"/></a>
    <a href='?type=title&&sort=<?=$status?>'><button type="submit">Сортировка по алфавиту</button></a>
    <a href='?type=category&&sort=<?=$status?>'><button type="submit">Сортировка по категориям</button></a>


    <?php
        foreach($projects as $project) {
            ?>
                <div>
                    <h4><?= $project['title']?></h4>
                    <span><?= $project->creator_name?></span> <br>
                    <span><?= $project->category?></span> <br>
                    <a href="project.php?id=<?= $project->id?>">View project</a>
                    <a href="update_objects.php?id=<?= $project->id?>">Update data</a>
                    <a href="php/delete.php?id=<?= $project->id?>">Delete data</a>
                </div>
                <?php
            }
        } catch (Throwable $e) {
            echo $e;
        }
    ?>


    
</body>
</html>