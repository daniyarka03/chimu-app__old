<?php

    require "includes/db.php";


    $id = $_GET['id'];
    $project = R::load('projects', $id);
    R::trash($project);
    setcookie('user', $_POST['name'], time() - 3600 * 24 * 30, "/");
    setcookie('id', $_POST['id'], time() - 3600 * 24 * 30, "/");

    header('Location: ../list_objects.php');


?>