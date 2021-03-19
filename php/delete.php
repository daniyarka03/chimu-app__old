<?php

    require "includes/db.php";

    echo 'loading';

    $id = $_GET['id'];
    $project = R::load('projects', $id);
    R::trash($project);

    header('Location: ../list_objects.php');


?>