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
            height: 80px;
            background-color: #c4c4c4;
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <a href="add_objects.html"><button>Add object</button></a>
    <a href="index.php"><button>Main menu</button></a><br /> <br>
    <?php
        try {
            require "php/includes/db.php";
        
            $projects = R::findAll('projects');
            $id = $_COOKIE['id'];

            foreach($projects as $project) {
               
            ?>
                <div>
                    <h4><?= $project['title']?></h4>
                    <span><?= $project->creator_name?></span>
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