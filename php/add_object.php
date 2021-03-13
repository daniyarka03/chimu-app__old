<?php 
    require "includes/rb.php";
    R::setup('mysql:host=localhost;dbname=chimu-team', 'root', '' );

    $title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);
    $creator = $_COOKIE['user'];

    $project = R::dispense('projects');
    $project->title = $title_object;
    $project->creator = $creator;

    R::store($project);
    R::close();


    header('Location: ../');
?>