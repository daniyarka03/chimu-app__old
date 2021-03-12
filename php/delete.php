<?php

require "includes/db.php";

$id = $_GET['id'];

$mysql->query("DELETE FROM `projects` WHERE `projects`.`id` = '$id'");
$mysql->close();

header('Location: ../');


?>