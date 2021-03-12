<?php 

require "includes/db.php";

$title_object = filter_var(trim($_POST['title_object']), FILTER_SANITIZE_STRING);
$creator = $_COOKIE['user'];

$mysql->query("INSERT INTO `projects` (`title`, `creator`) VALUES('$title_object', '$creator')");
$mysql->close();

header('Location: ../')
?>