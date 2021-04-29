<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="widadditional_modalth=device-width, initial-scale=1.0">
    <title>Главная страница</title>
</head>
<body>
    <?php if ($_COOKIE['user'] == ''): ?>
    <a href="./register.php">Регистрация</a>
    <a href="./login.php">Авторизация</a>

    <?php else: ?>
        <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="./php/exit.php">здесь</a></p>
        <a href="./profile.php">Зайти в профиль</a> <br>
        <a href="add_objects.php">Добавить объекты</a> <br>
        <a href="./list_objects.php">Показать объекты</a>
        <a href="./list_users.php">Показать пользователей</a>
        <a href="./notifications.php">Уведомление</a>

    <?php endif; ?>
</body>
</html>