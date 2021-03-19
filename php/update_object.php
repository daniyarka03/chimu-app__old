<?php

    require "includes/db.php";

    $title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);
    $creator = $_COOKIE['user'];
    $id = $_POST['id'];

    $project = R::load('projects', $id);
    $project->title = $title_object;
    R::store($project);
    R::close();

    header('Location: ../list_objects.php');
    exit();

?>