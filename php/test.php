<?php
    if (isset($_POST['submit'])) {
        $size = getimagesize("https://rendering.ru/media/catalog/product/cache/5eba369889d231319121094e533c3c45/i/t/itrees-palms-03.jpg");
        echo var_dump($size);
    }
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
    <input type="file" name="file" />
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
