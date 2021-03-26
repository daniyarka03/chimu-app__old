<?php

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/multiselect_plugin/chosen.min.css">
    <title>Document</title>
</head>
<body>
<form action="./test.php" method="POST">
    <select name="my_select[]" id="mselect" multiple="" style="width: 300px;">
        <optgroup label="Русская кухня">
            <option value="Закуска Барская">Закуска Барская</option>
            <option value="Раки, фаршированные по-царски">Раки, фаршированные по-царски</option>
            <option value="Биточки в горшочке">Биточки в горшочке</option>
        </optgroup>
    </select>
    <input type="submit" name="submit" value="Submit"/>
</form>

<script src="../js/jquery.js"></script>
<script src="../js/multiselect_plugin/chosen.jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#mselect').chosen();
    });
</script>
</body>
</html>
