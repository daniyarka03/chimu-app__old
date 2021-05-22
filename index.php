<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widadditional_modalth=device-width, initial-scale=1.0">
    <title>Главная страница</title>
    <link rel="stylesheet" href="css/sidebar.css" />
</head>
<body>
    <?php include './php/components/sidebar.php' ?>
    <?php if ($_COOKIE['user'] == ''): ?>
        <a href="./register">Регистрация</a>
        <a href="./login">Авторизация</a>
    <?php else: ?>
        <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="./php/exit.php">здесь</a></p>
        <a href="./profile">Зайти в профиль</a> <br>
        <a href="add_objects">Добавить объекты</a> <br>
        <a href="./list_objects">Показать объекты</a>
        <a href="./list_users">Показать пользователей</a>
        <a href="./notifications">Уведомление</a>
    <?php endif; ?>
</body>
</html>