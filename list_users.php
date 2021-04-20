<?php
    try {
        require "php/includes/db.php";

        // Search items script
        if ($_GET['reset_data'] == 'Сброс') {
            header("Location: ./list_users.php");
        } else {
            $query = $_GET['query'];
            $users = R::findAll('users', "first_name LIKE '%$query%'");
            $id = $_COOKIE['id'];

            $test = str_split($_SERVER['REQUEST_URI']);
            $e = array_search('q', $test);

            if ($e) {
                echo 'True';
            } else {
                echo 'False';
            }
        }


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
<a href="index.php"><button>Main menu</button></a><br /> <br>

<form action="list_users.php" method="get">
    <input type="search" name="query" placeholder="Поиск..." />
    <input type="submit" value="Поиск">
    <input type="submit" name="reset_data" value="Сброс">
</form>

<?php
foreach($users as $user) {
    ?>
    <div>
        <h4><?= $user['first_name'] . ' ' .  $user->last_name?></h4>
        <span><?= $user['work_activity'] ?></span> <br>
        <span><?= $user['keywords_profile'] ?></span> <br>
        <a href="user.php?id=<?= $user->id?>">View user</a>
        <a href="update_objects.php?id=<?= $user->id?>">Update data</a>
        <a href="php/delete.php?id=<?= $user->id?>">Delete data</a>
    </div>
    <?php
}
} catch (Throwable $e) {
    echo $e;
}
?>



</body>
</html>