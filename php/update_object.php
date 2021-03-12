<?php

require "includes/db.php";

$title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);
$creator = $_COOKIE['user'];
$id = $_POST['id'];

$mysql->query("UPDATE `projects` SET `title` = '$title_object', `creator` = '$creator' WHERE `projects`.`id` = '$id'");
$mysql->close();

header('Location: ../');

?>