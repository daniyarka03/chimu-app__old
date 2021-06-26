<?php
    require 'php/includes/db.php';
    $work_tags = R::findAll('TBLWorkActivity');
    $tags = R::findAll('TBLTags');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/multiselect_plugin/chosen.css">
    <link rel="stylesheet" href="css/add_project.css" />
    <link rel="stylesheet" href="css/sidebar.css" />
    <title>Создание нового проекта</title>
</head>
<body>
    
    <?php include 'php/components/sidebar.php' ?>

    <form action="php/add_object.php" method="post" enctype="multipart/form-data">
        <?php include 'php/components/add_project/step_1.php' ?>
        <?php include 'php/components/add_project/step_2.php' ?>
        <?php include 'php/components/add_project/step_3.php' ?>
    </form>

    <script src="js/jquery.js"></script>
    <script src="js/multiselect_plugin/chosen.jquery.min.js"></script>

    <script>
        const block = document.querySelectorAll(`.section-add-project`);
        const button = document.querySelectorAll(`.section-add-project__button_next`);
        const button_back = document.querySelectorAll(`.section-add-project__button_back`);
        const req_input = document.querySelectorAll(`.require`);
        

    </script>

    <script src="js/multiple_windows.js"></script>
    <script src="js/inputs.js"></script>

    <script>
        $(document).ready(function(){
            $('#mSelectArea').chosen({width: "100%", placeholder_text_multiple: "Тип проекта", no_results_text: "Ничего не найдено под: "});
            $('#mselectKeywordsProfile').chosen({width: "100%", placeholder_text_multiple: "Кто нужен в проект"});
        });

        step_function(3, block, button, button_back);
    </script>
</body>
</html>