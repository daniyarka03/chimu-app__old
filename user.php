<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
    <style>

        .project__card {
            width: 400px;
            min-height: 80px;
            height: auto;
            background-color: #c4c4c4;
            border: 1px solid #333;
            padding-left: 20px;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .project__cards {
            overflow: scroll;
            height: 400px;

        }

        * {
            box-sizing: border-box;
        }

        .wrapper a {
            display: inline-block;
            text-decoration: none;
            padding: 15px;
            background-color: #fff;
            border-radius: 3px;
            text-transform: uppercase;
            color: #585858;
            font-family: 'Roboto', sans-serif;
        }

        .modal {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(77, 77, 77, .7);
            transition: all .4s;
        }

        .modal:target {
            visibility: visible;
            opacity: 1;
        }

        .modal__content {
            border-radius: 4px;
            position: relative;
            width: 500px;
            max-width: 90%;
            background: #fff;
            padding: 1em 2em;
        }

        .modal__footer {
            text-align: right;
        a {
            color: #585858;
        }
        i {
            color: #d02d2c;
        }
        }
        .modal__close {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #585858;
            text-decoration: none;
            font-size: 36px;
            color: red;
        }

        .modal__content  textarea {
            display: block;
            width: 100%;
            height: 150px;
            padding: 10px;
        }

        .modal__content form button[type="submit"] {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
            padding: 10px 0;
        }
    </style>
</head>
<body>
<?php
try {
    require "php/includes/db.php";
    $id = $_GET['id'];

    if (!isset($id)) {
        header("Location: /chimu-app");
    }

    $user = R::load('users', $id);

    $id_notification = uniqid(rand(), true);
    $notifications_item = R::findAll('notifications');
    foreach ($notifications_item as $item) {
        if ($item->id_notification == $id_notification) {
            $id_notification = uniqid(rand(), true);
        }
    }

    if (isset($_POST['request'])) {
        $project_creator = filter_var(trim($_POST['creator_id']), FILTER_SANITIZE_STRING);
        $id_project = filter_var(trim($_POST['id_project']), FILTER_SANITIZE_STRING);
        $title_project = filter_var(trim($_POST['title_project']), FILTER_SANITIZE_STRING);
        $id_user = filter_var(trim($_POST['id_user']), FILTER_SANITIZE_STRING);

        $project_selected = R::load('projects', $id_project);

        $notifications = R::dispense('notifications');
        $notifications->id_notification = $id_notification;
        $notifications->id_project = $id_project;
        $notifications->text = 'Вас пригласили в проект: ' . $title_project;
        $notifications->user_sender = $_COOKIE['id'];
        $notifications->is_checked = "false";
        $notifications->user_recipient = $id_user;
        $notifications->theme = "Приглашение в проект";



        R::store($notifications);
    }
} catch (Throwable $e) {
    echo $e;
}



?>

<h2>Имя: <?= $user['first_name'] ?></h2>
<span>Фамилия: <?= $user['last_name'] ?></span> <br>
<span>Специальность: <b><?= $user['work_activity'] ?></b></span> <br>
<span>Ключевые слова: <b><?= $user['keywords_profile'] ?></b></span> <br>


<a href="#demo-modal" class="join_project__button">Invite to project</a>



<div id="demo-modal" class="modal">
    <div class="modal__content">
        <h1>Заявка по приглашению в проект</h1>
        <p>
            Выберите проект, в который вы хотите пригласить пользователя!
        </p>
        <div class="project__cards">
        <?php
            $id_user = $_COOKIE['id'];
            $projects = R::findAll('projects', "creator_id LIKE '%$id_user%'");
            foreach($projects as $project) {
        ?>

            <div class="project__card">
                <h4><?= $project['title']?></h4>
                <span><?= $project->creator_name?></span> <br>
                <span><?= $project->category?></span> <br>
                <a href="project.php?id=<?= $project->id?>">View project</a>
                <a href="./user.php?id=<?= $_GET['id'] ?>&id_project=<?= $project->id?>#additional_modal">Select project</a>
            </div>

        <?php
            }

    ?>
        </div>


        <a href="#" class="modal__close">&times;</a>
    </div>
</div>

<div id="additional_modal" class="modal">
    <div class="modal__content">
        <?php
        $id_user = $_GET['id'];
        $user = R::load('users', $id_user);
        $selected_project = R::load('projects', $_GET['id_project']);

        ?>
        <h1>Уверены, что хотите пользователя пригласить в проект <?= $selected_project->title ?></h1>
        <p>
            Если вы уверены, то нажмите на "пригласить".
        </p>

        <form action="user.php" method="POST">
            <input type="hidden" name="creator_id" value=<?= $selected_project['creator_id'] ?>>
            <input type="hidden" name="id_project" value=<?= $selected_project['id_project'] ?>>
            <input type="hidden" name="title_project" value=<?= $selected_project['title'] ?>>
            <input type="hidden" name="id_user" value=<?= $user['id_user'] ?>>
            <button type="submit" name="request">Пригласить</button>
            <button type="submit" name="cancel_request">Отмена</button>
        </form>

        <a href="#" class="modal__close">&times;</a>
    </div>
</div>

<script>
    const join_project__button = document.querySelector('.join_project__button');
    join_project__button.addEventListener('click', () => {

    });
</script>

</body>
</html>