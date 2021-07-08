<?php

	if (isset($_COOKIE['id'])) {
    	header('Location: list_objects');
    }

	if (!isset($_COOKIE['id'])) {
    	header('Location: login');
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widadditional_modalth=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/sidebar.css" />
    <style>
        main {
            margin-left: 158px;
        }
      
      button {
      	width: 200px; 
        padding: 10px;
      }
    </style>
</head>
<body>
    <?php if (($_COOKIE['user'] ?? "") != "") include './php/components/sidebar.php' ?>
    <main>
    <?php if (($_COOKIE['user'] ?? "") == ''): ?>
      	<a href="./register"><button>Регистрация</button></a>
        <a href="./login"><button>Авторизация</button></a>
    <?php else: ?>
       
    <?php endif; ?>
      
      
      
    </main>
</body>
</html>