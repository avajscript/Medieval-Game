<?php
include ('../server/db_connection.php');
include ('../server/functions.php');
$conn = OpenCon();
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // get login fields
    $usernameOrEmail = clean_input($_POST['username']);
    $password = clean_input($_POST['password']);

    // create query to fetch user(s)
    $login_query = "SELECT * FROM users WHERE username = '$usernameOrEmail' OR email = '$usernameOrEmail'";

    // execute query
    $users = $conn->query($login_query);

    // check if user match
    if($users->num_rows > 0) {
        $user = $users->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['userid'] = $user['userID'];
        echo "Successfully logged in";
    } else {
        echo "User not found";
    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../styles/main.css">
        <title>Login</title>
    </head>
    <body>
        <?php
            include ('../components/header.php');
        ?>
        <main class="default-page">
            <h1 class = 'mar-bottom-16'>Login</h1>
            <form action="login.php" method = 'post' onsubmit="return true">
                <div class="input-field">


                <label for="">
                    <h5>
                        Username/Email
                    </h5>
                    <input type="text" name = 'username' id = 'username'>
                </label>
                </div>

                <div class="input-field">
                <label for="">
                    <h5>
                        Password
                    </h5>
                    <input type="password" name = 'password' id = 'password'>
                </label>
                </div>

                <p class="mar-bottom-8">Don't have an account? <a href="signup.php">Signup</a></p>


                <button type = 'submit'>Sign In</button>
            </form>
        </main>

    </body>
</html>
