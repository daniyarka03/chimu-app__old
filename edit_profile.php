<?php
    // Импорт бд
    require 'php/includes/db.php';

    // Поиск текущего пользователя по id
    $profile = R::findOne('users', 'id_user = ?', array($_COOKIE['id']));

    // Импорт данных с бд
    $work_activity_tags = explode(', ', $profile->work_activity);
    $profile_tags = explode(', ', $profile->keywords_profile);
    $profile_country = explode(', ', $profile->country);
    $gender = $profile->gender;
    $city = explode(', ', $profile->city);
    $birthdate = $profile->birthdate;
    $descr = $profile->descr;

    // Импорт доп. данных с бд
    $tags = R::findAll('TBLTags');
    $tagsCountry = R::findAll('TBLCountries');
    $gender_data = ['Мужской', 'Женский', 'Другое'];
    $work_tags = R::findAll('TBLWorkActivity');
    $tagsCity = R::findAll('TBLCity');

    $country = $profile->country;

?>

<!doctype html> 
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/edit_profile.css" />
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.css" />
    <link rel="stylesheet" href="css/sidebar.css" />

    <title>Изменение профиля</title>
</head>
<body>

    <?php include 'php/components/sidebar.php' ?>

    <form action="php/edit_profile.php" method="POST">
        <?php include 'php/components/edit_profile/step_1.php' ?>
        <?php include 'php/components/edit_profile/step_2.php' ?>
        <?php include 'php/components/edit_profile/step_3.php' ?>
        <?php include 'php/components/edit_profile/step_4.php' ?>
    </form> 

    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>
    <script src="js/inputs.js"></script>
    <script src="js/multiple_windows.js"></script>
    
    <script>

    const block = document.querySelectorAll(`.section-register`);
    const button = document.querySelectorAll(`.section-register__button_next`);
    const button_back = document.querySelectorAll(`.section-register__button_back`);
    const require_input = document.querySelectorAll('.require');

    // step_function(4, block, button, button_back, 5, 4, 1);
    // step_function(4, block, button, button_back);

        $(document).ready(function(){
            $('#mselectCountryEdit').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_single: "Страна проживания", allow_single_deselect: true});
            // $('#mselectCity').chosen();
            $('#mselectWorkEdit').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_multiple: "Интересующая область"});
            $('#mselectKeywordsEdit').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_multiple: "Навыки"});
            $('#mselectGenderEdit').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_single: "Выберите пол"});
        });

    </script>
    <script src="js/edit_profile.js"></script>
</body>
</html>