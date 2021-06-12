<?php
    require 'php/includes/db.php';

    $profile = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));
    
  
?>


<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/profile.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <title><?=$profile['first_name']?></title>
</head>
<body>
    <!-- <h2>Profile</h2>
    <span>Name: <?= $profile->first_name ?></span> <br>
    <span>Last Name: <?= $profile->last_name ?></span> <br>
    <span>Email: <?= $profile->email ?></span> <br>
    <div class="control-panel">
        <a href="edit_profile.php" class="panel__item"><button>Update info</button></a>
        <a href="php/delete_profile.php" class="panel__item"><button>Delete account</button></a>
        <a href="php/exit.php" class="panel__item"><button>Sign out</button></a>
    </div> -->

    <?php include "php/components/sidebar.php" ?>

    <main>
        <div class="section section-basic">
            <div class="container">
                <div class="block">
                    <img src="img/Ellipse 1.png" alt="" class="section-basic__img">
                </div>
                <div class="block">
                    <h2 class="section-basic__name"><?= $profile->first_name ?> <br> <?= $profile->last_name ?></h2>
                    <span class="section-basic__date"><?= $profile->birthdate ?></span>
                    <span class="section-basic__geolocation"><?= $profile->country?></span>
                </div>
                <div class="block">
                    <a href="edit_profile"><button class="section-basic__button">Редактировать профиль</button></a>
                </div>
            </div>
        </div>
        <div class="section section-skills">
            <div class="container">
                <h2 class="section-skills__title section__title">
                    Ключевые навыки
                </h2>
                <div class="section-skills__block">
                    <?php 
                        $tags = explode(', ', $profile->keywords_profile);
                                    
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
                <h2 class="section-about__title section__title">О себе</h2>
                <p class="section-about__text" id="descr">
                    <?php
                    
                        if ($profile->descr != "") {
                            echo $profile->descr;
                        } else {
                            echo '( Пользователь еще не добавил описания о себе! )';
                        }
                    
                    ?>
                </p>
            </div>
        </section>
        <div class="section section-projects">
            <div class="container">
                <h2 class="section-projects__title section__title">Мои проекты</h2>
                <div class="section-projects__cards swiper-container mySwiper">
                    <div class="swiper-wrapper">
                <?php
                    $id_user = $profile->id_user;
                    $projects = R::findAll('projects', 'members_project = ?', array($id_user));
                ?>
                <?php 
                
                    foreach ($projects as $project) {

                ?>
                    <div class="card__block">
                        <img src="img/card__img.png" alt="" class="card__img">
                        <h2 class="card__title"><?= $project->title ?></h2>
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
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
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
    <?php include 'footer.php' ?>
    <script src="js/jquery.js"></script>
    <script>

        $(document).ready(() => {
            const descr = $('#descr_card').text().trim();
            
            if (descr.length >= 80) {
                $('#descr_card').text(descr.slice(0, 80) + '...');
            }
        });
        
        
        
    </script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>
</body>
</html>