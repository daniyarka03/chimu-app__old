<?php
    require "includes/db.php";



    try {
        $title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);

        $project = R::dispense('projects');
        $project->creator_name = $_COOKIE['user'];
        $project->title = $title_object;
        $project->creator_id = $_COOKIE['id'];

        R::store($project);
        R::close();

        header('Location: ../list_objects.php');
        exit();
    } catch (Throwable $e) {
        echo $e;
    }
?>