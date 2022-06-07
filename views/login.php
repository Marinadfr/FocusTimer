<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Icono de pagina-->
    <link rel="shortcut icon" href="../assets/icon.png" />

    <!--CSS-->
    <link rel="stylesheet" href="../styles/index.css" />
    <link rel="stylesheet" href="../styles/errors.css" />

    <!--Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@700&display=swap" rel="stylesheet" />

    <title>Log in</title>
</head>

<body>
    <div class="grid-login">
        <div class="container">

            <!--LOG IN-->
            <div class="login-info">
                <h1>Log in</h1>
                <h2>Welcome, cheer up! Let's start</h2>


                <!--Username and Password-->

                <form method="POST" class="login">

                    <input type="text" name="username" placeholder="Username"> <br>
                    <input type="password" name="password" placeholder="Password"> <br>
                    <input type="submit" value="Start">

                </form>



                <!--Sign up-->

                <div class="sign-up">
                    <p><a href="http://localhost/FocusTimer/views/register.php"> Don't have an account? </a></p>
                </div>
            </div>

            <!--Imagen-->
            <div class="image-container">
                <img id="reloj" src="../assets/reloj.png" />
                <img id="mushroom" src="../assets/mushroom gif.gif" />
            </div>
        </div>

</body>

</html>

<?php

require('../server/connection.php');

session_start();
if (isset($_SESSION['username'])) {
    header("Location: http://localhost/FocusTimer/index.php");
}

if ($_POST) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT username, password, role FROM user WHERE username='$username'";

    $query = $client->prepare($sql);
    $query->execute();

    $result = $query->fetchAll();

    try {

        if (count($result) === 0) {
            throw new Error("Incorrect user or password");
        }

        $currentPasswordHash = hash('sha256', $password);

        if (!hash_equals($result[0]['password'], $currentPasswordHash)) {
            throw new Error("Incorrect user or password");
        }

        $_SESSION['username'] = $username;

        $_SESSION['role'] = $result[0]['role'];
        header('Location:http://localhost/FocusTimer/');
    } catch (Throwable $errno) {
        $class = "box-error-login";
        $message = $errno->getMessage();

        echo "<h4 class=$class>$message</h4>";
    }
}
