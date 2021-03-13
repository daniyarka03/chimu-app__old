<?php

require "php/includes/rb.php";

R::setup('mysql:host=localhost;dbname=chimu-team', 'root', '' );

$user = R::dispense('users');
$user->email = "Jack";
$user->first_name = "Jack";
$user->last_name = "Jack";
$user->pass = "DSAD";

R::store($user);
R::close();


?>