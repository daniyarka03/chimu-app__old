<?php

    require "./php/includes/db.php";

    $id = $_GET['id'];
    $project = R::load('projects', $id);


    $project_category = explode(', ', $project['category']);
    $project_keywords_need_users = explode(', ', $project['keywords_need_users']);

    $size = sizeof($project_category);


//    foreach ($project_category as $item) {
//        echo '<li class="search-choice"><span>111</span><a class="search-choice-close" data-option-array-index="2"></a></li>';
//    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.css">
    <link rel="stylesheet" href="css/edit_project.css">
    <link rel="stylesheet" href="css/sidebar.css">


    
    <title>Document</title>
</head>
<body>
    
    <?php include "php/components/sidebar.php" ?>

    <form action="./php/update_object.php" method="post" enctype="multipart/form-data">
        <?php include "php/components/edit_project/step_1.php" ?>
        <?php include "php/components/edit_project/step_2.php" ?>
        <?php include "php/components/edit_project/step_3.php" ?>
    </form>

    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>
    <script src="js/inputs.js"></script>
    <script src="js/multiple_windows.js"></script>
    <script>

        const block = document.querySelectorAll(`.section-add-project`);
        const button = document.querySelectorAll(`.section-add-project__button_next`);
        const button_back = document.querySelectorAll(`.section-add-project__button_back`);
        const req_input = document.querySelectorAll(`.require`);
        

    // step_function(4, block, button, button_back, 5, 4, 1);
    step_function(3, block, button, button_back);

        $(document).ready(function(){
            $('#mselectArea').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_multiple: "Интересующая область"});
            $('#mselectKeywordsProject').chosen({no_results_text: "Ничего не найдено под: ", width: "100%", placeholder_text_multiple: "Кто нужен в проект"});
        });
    </script>
</body>
</html>