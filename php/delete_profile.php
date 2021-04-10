<?php
    require 'includes/db.php';

    $user = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
    R::trash($user);
    setcookie('user', $_POST['name'], time() - 3600 * 24 * 30, "/");
    setcookie('id', $_POST['id'], time() - 3600 * 24 * 30, "/");

    header('Location: /chimu-app');


?>