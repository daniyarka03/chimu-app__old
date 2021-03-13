<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
</head>
<body>
<?php
    
    try {
        // Импортируем файл db.php, чтобы соединиться с бд
        require "./php/includes/db.php";

        // Переменные данных с разметки
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
        $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);

        // Пароль введеный пользователем, шифруем
        $pass = md5($pass);

        // Получаем данные с бд
        $result = $mysql->query("SELECT * FROM `users` 
        WHERE `email` = '$email' AND `pass` = '$pass'");
    
        // Переводим объект в массив
        $user = $result->fetch_assoc();

        // Если такого пользователя не существует, выводим сообщение
        if(count($user) == 0) {
            echo "Такой пользователь не найден";
            exit();
        } 

        // Создаем куки, для времени сеанса
        setcookie('user', $user['first_name'], time() + 3600 * 24 * 30, "/");

        // Закрываем связь с бд
        $mysql->close();
        if ($_POST['do_signup'] == true) {
            header("Location: /chimu-app");
        }

    } catch (Throwable $e) {
        // Выводим ошибку, если она имеется
        echo $e;
    }



    
?>

<form action="./login.php" method="POST">
        <div>
            <span>Email</span>
            <input type="email" name="email" value="<?php @$data['email'] ?>">
        </div>
        <div>
            <span>Password</span>
            <input type="password" name="password" value="<?php @$data['password'] ?>">
        </div>
        <div>
            <button type="submit" value="login" name="do_signup">Авторизоваться</button>
        </div>
    </form>
</body>
</html>