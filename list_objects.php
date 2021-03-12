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
    <?php
        try {
            require "./php/includes/db.php";
        
            $projects = $mysql->query("SELECT * FROM `projects`");
            $projects = mysqli_fetch_all($projects);
            foreach($projects as $project) {
               
            ?>
                <div>
                    <h4><?= $project[1]?></h4>
                    <span><?= $project[2]?></span>
                    <a href="project.php?id=<?= $project[0]?>">View project</a>
                    <a href="update_objects.php?id=<?= $project[0]?>">Update data</a>
                    <a href="php/delete.php?id=<?= $project[0]?>">Delete data</a>
                </div>
            <?php
            }
        $mysql->close();
        } catch (Throwable $e) {
            echo $e;
        }
    
    ?>

    
</body>
</html>