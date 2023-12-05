<?php
$username = "";
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
    } else {
        header("Location: login.php");
    }
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Account Page</title>
    </head>
    <body>
        <h1 class = 'mar-bottom-8'>Your Account</h1>
        <p>
            <?php
            echo $username;
            ?>
        </p>
    </body>
</html>
