<?php
session_start();
include "../server/db_connection.php";
include "../server/functions.php";
$conn = OpenCon();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // clean all of the inputs for malicious strings
    $username = clean_input($_POST['username']);
    $email = clean_input($_POST['email']);
    $password = clean_input($_POST['password']);
    $passwordConfirm = clean_input($_POST['passwordConfirm']);

    $errorState = false;
    $errorString = "";
    // validate username
    if(!preg_match('/^\S{1,30}$/', $username)) {
       $errorState = true;
       $errorString .= "Username 1 - 30 letters and no spaces <br>";
    }
    // validate email
    if(!preg_match('/^\S+@\S+\.\S+/', $email)) {
        $errorState = true;
        $errorString .= "Email must be in the form johndoe@gmail.com <br>";
    }

    // validate password
    if(!preg_match('/^\S{8,50}$/', $password)) {
        $errorState = true;
        $errorString .= "Password must be 8 - 50 letters and contain no spaces <br>";
    }

    // check if passwords match
    if($password !== $passwordConfirm) {
        $errorState = true;
        $errorString .= "Password must match each other <br>";
    }

    // if error, output error message and exit script
    if($errorState) {
        echo $errorString;
        // form is valid and data can now be sent to the server
    } else {
        $email_username_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email'";
        $users = $conn->query($email_username_query);
        // username or email already taken.
        // CHANGE TO CHECK EACH INDIVIDUALLY
        if($users->num_rows > 0) {
            $errorState = true;
            $errorString = "Email or username already taken <br>";
            // user has not been created and can be inserted into database
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $user_insert_query = "INSERT INTO users (username, email, password_hash) 
            VALUES ('$username', '$email', '$passwordHash')";
            // create user
            if($conn->query($user_insert_query) === TRUE) {
                // successfully created
                echo "New user successfully created";
                // error creating user
            } else {
                echo "Error: " . $conn->error;
            }
        }
    }
    // output error if any
    if($errorState) {
        echo $errorString;
    }
    // close the connection
    CloseCon($conn);

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
        <title>Sign up</title>
    </head>
    <body>
        <?php
        include ('../components/header.php');
        ?>
        <main class="default-page">
            <h1 class = 'mar-bottom-16'>Create an Account</h1>
            <form action="signup.php" method = 'post' onsubmit="">
                <div class="input-field">


                    <label for="">
                        <h5>
                            Username
                        </h5>
                        <input type="text" name = 'username' id = 'username'>
                    </label>
                </div>

                <div class="input-field">
                    <label for="">
                        <h5>
                            Email
                        </h5>
                        <input type="text" name = "email" id = 'email' >
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

                <div class="input-field">
                    <label for="">
                        <h5>
                            Password Confirm
                        </h5>
                        <input type="password" name = 'passwordConfirm' id = 'passwordConfirm'>
                    </label>
                </div>

                <p class = 'mar-bottom-8'>Already have an account? <a href="login.php">Sign In</a></p>
                <button type = 'submit'>Sign up</button>
            </form>
        </main>
        
    </body>
</html>
