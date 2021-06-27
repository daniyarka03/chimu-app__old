<?php
require "php/includes/db.php";
$email = $_POST['email'];

$users = R::findAll('users', 'ORDER BY id');
$users_email = R::findAll('users', 'email = ?', array($email));
$profile = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
$status = ($users[$profile['id']]['email']) == $profile['email'];;


 
    if ($users_email == [] or $email == $profile['email']) {
        // $status = (in_array($email, $users['email'])) ? true : false;
        
            $response = [
                "email" => $email,
                "user" => $users_email,
                "status" => true
            ];
        
        
    
        echo json_encode($response); 
    } else {
        $response = [
            "email" => $email,
            "users_email" => $users_email,
            "status" => false,
            "profile_email" => $profile['email']
        ];
    
        echo json_encode($response); 
    }





?>