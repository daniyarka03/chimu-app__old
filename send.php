<?php
require "php/includes/db.php";
$email = $_POST['email'];

$users = R::findAll('users', 'email = ?', array($email));

if ($users === []) {
    // $status = (in_array($email, $users['email'])) ? true : false;
    $response = [
        "email" => $email,
        "user" => $users,
        "status" => true
    ];

    echo json_encode($response); 
} else {
    $response = [
        "email" => $email,
        "user" => $users,
        "status" => false,
    ];

    echo json_encode($response); 
}





?>