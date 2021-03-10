<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if ($_COOKIE['user'] == ''): ?>
    <a href="./register.php">Регистрация</a>
    <a href="./login.php">Авторизация</a>

    <?php else: ?>
        <p>Привет <?=$_COOKIE['user']?>. Чтобы выйти нажмите <a href="./php/exit.php">здесь</a></p>
    <?php endif; ?>
</body>
</html>