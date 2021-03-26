<?php

    require "includes/db.php";

    $title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);
    $creator = $_COOKIE['user'];
    $id = $_POST['id'];
    $category_object = implode(', ', $_REQUEST['category_object']);


$project = R::load('projects', $id);
    $project->title = $title_object;
    $project->category = $category_object;
    R::store($project);
    R::close();

    header('Location: ../list_objects.php');
    exit();

?>