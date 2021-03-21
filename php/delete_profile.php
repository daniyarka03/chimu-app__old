<?php
    require 'includes/db.php';

    $user = R::load('projects', (int)array($_COOKIE['id']));
    R::trash($user);

    header('Location: /chimu-app');


?>