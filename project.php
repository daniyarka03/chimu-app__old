<?php
        try {
            require "php/includes/db.php";
            $id = $_GET['id'];

            if (!isset($id)) {
                header("Location: /chimu-app");
            }

            $project = R::load('projects', $id);

            $id_notification = uniqid(rand(), true);
            $notifications_item = R::findAll('notifications');
            foreach ($notifications_item as $item) {
                if ($item->id_notification == $id_notification) {
                    $id_notification = uniqid(rand(), true);
                }
            }

            $req_message = filter_var(trim($_POST['request_message']), FILTER_SANITIZE_STRING);
            $project_creator = filter_var(trim($_POST['creator_id']), FILTER_SANITIZE_STRING);
            $id_project = filter_var(trim($_POST['id_project']), FILTER_SANITIZE_STRING);

            $notifications = R::dispense('notifications');
            $notifications->id_notification = $id_notification;
            $notifications->id_project = $id_project;
            $notifications->text = $req_message;
            $notifications->user_sender = $_COOKIE['id'];
            $notifications->is_checked = "false";
            $notifications->user_recipient = $project_creator;
            $notifications->theme = "Вступление в проект";



            R::store($notifications);
        } catch (Throwable $e) {
            echo $e;
        }



    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/project.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <title>Project <?= $project['title'] ?></title>
    <style>

    </style>
</head>
<body>
    

    <!-- <h2>Название проекта: <?= $project['title'] ?></h2>
    <span>Создатель: <?= $project['creator_name'] ?></span> <br>
    <span>Категория: <b><?= $project['category'] ?></b></span> <br>

    <?php if ($_COOKIE['id'] == $project['creator_id']): ?>
        <a href="update_objects.php?id=<?= $project->id?>">Update data</a>
        <a href="php/delete.php?id=<?= $project->id?>">Delete data</a>
    <?php else: ?>
        <a href="#demo-modal" class="join_project__button">Join Project</a>
    <?php endif; ?> -->

    <?php include "php/components/sidebar.php" ?>

<main>
    <div class="section section-basic">
        <div class="container">
            <div class="block">
                <img src="img/Ellipse 1.png" alt="" class="section-basic__img">
            </div>
            <div class="block">
                <h2 class="section-basic__name"><?= $project['title'] ?></h2>
                <span class="section-basic__date">Создатель проекта: <?= $project['creator_name'] ?></span>
                <span class="section-basic__geolocation"></span>
            </div>
            <div class="block">
                <?php if ($project['creator_id'] == $_COOKIE['id']) echo '<a href="update_objects.php?id='.$project->id.'"><button class="section-basic__button">Редактировать проект</button></a>' ?>
                <?php if ($project['creator_id'] != $_COOKIE['id']) echo '<a href="#demo-modal"><button class="section-basic__button">Вступить в проект</button></a>' ?>
            </div>
        </div>
    </div>
    <div class="section section-skills">
        <div class="container">
            <h2 class="section-skills__title section__title">
                Деятельность проекта
            </h2>
            <div class="section-skills__block">
                <?php 
                    $tags = explode(', ', $project->category);
                                
                    foreach ($tags as $tag) {
                        ?>
                        <span class="section-skills__tag"><?=$tag?></span>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="section section-skills">
        <div class="container">
            <h2 class="section-skills__title section__title">
                Кто нужен
            </h2>
            <div class="section-skills__block">
                <?php 
                    $tags = explode(', ', $project->keywords_need_users);
                                
                    foreach ($tags as $tag) {
                        ?>
                        <span class="section-skills__tag"><?=$tag?></span>
                        <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <section class="section section-about">
        <div class="container">
            <h2 class="section-about__title section__title">О проекте</h2>
            <p class="section-about__text" id="descr">
                <?php
                
                    if ($project->descr != "") {
                        echo $project->descr;
                    } else {
                        echo '( Пользователь еще не добавил описания о себе! )';
                    }
                
                ?>
            </p>
        </div>
    </section>
    <div class="section section-projects">
        <div class="container">
            <h2 class="section-projects__title section__title">Все участники проекта</h2>
            <div class="section-projects__cards">

            <?php
                
                // Нужно сделать выведение всех участников проекта

                $members_project = $project->members_project.implode($members_project);
            ?>
            <?php 
            
                foreach ($members_project as $project) {

            ?>
                <div class="card__block">
                    <img src="img/card__img.png" alt="" class="card__img">
                    <h2 class="card__title"><?= $project->members_project ?></h2>
                    <span class="card__text" id="descr_card"><?= $project->descr ?></span>
                    <div class="card__tags">
                        <?php 
                            $tags = explode(', ', $project->category);
                                
                            foreach ($tags as $tag) {
                                
                                ?>
                                <span class="tag"><?=$tag?></span>
                                <?php
                            }
                        ?>
                    </div>
                    <a href="project?id=<?= $project->id ?>"><button class="card__button">Посмотреть проект</button></a>
                </div>

            <?php } ?>
            
            </div>
        </div>
    </div>
    <div class="section section-contacts">
        <div class="container">
            <h2 class="section-contacts__title section__title">Мои контакты</h2>
            <div class="section-contacts__block">
                <div class="social-icon">
                    <img src="img/Mail.svg" alt="">
                </div>
                <div class="social-text">
                    <span>@john_insta</span>
                </div>
            </div>
            <div class="section-contacts__block">
                <div class="social-icon">
                    <img src="img/instagram.svg" alt="">
                </div>
                <div class="social-text">
                    <span>@john_insta</span>
                </div>
            </div>
            <div class="section-contacts__block">
                <div class="social-icon">
                    <img src="img/telegram.svg" alt="">
                </div>
                <div class="social-text">
                    <span>@john_insta</span>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="js/jquery.js"></script>
<script>

    $(document).ready(() => {
        const descr = $('#descr_card').text().trim();
        
        if (descr.length >= 80) {
            $('#descr_card').text(descr.slice(0, 80) + '...');
        }
    });
    
    
    
</script>

    <div id="demo-modal" class="modal">
        <div class="modal__content">
            <h1>Заявка по вступлению в проект</h1>
            <p>
                Расскажите о себе, а также напишите, чем полезны вы могли бы быть проекту!
            </p>

            <form action="project.php" method="POST">
                <input type="hidden" name="creator_id" value=<?= $project['creator_id'] ?>>
                <input type="hidden" name="id_project" value=<?= $project['id_project'] ?>>
                <textarea type="text" name="request_message" placeholder="Пишите здесь..."></textarea>
                <button type="submit" name="request">Отправить</button>
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