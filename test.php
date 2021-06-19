<?php

    try {
        if (isset($_POST['submit']) and $_FILES) {
            move_uploaded_file($_FILES['file']['tmp_name'], "./".$_FILES['file']['name']);
            echo 'Success';
        } else {    
            echo 'Error';
        }
    } catch (Throwable $error) {
        echo $error;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" />
        <button type="submit" name="submit">Upload file</button>
    </form>
</body>
</html>