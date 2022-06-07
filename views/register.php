<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>

<body>
    <form method="POST">
        <input name="username" type="text" minlength="5" placeholder="Username" maxlength="10" required>
        <input name="password" type="password" minlength="5" placeholder="Password" required>
        <input name="confirmPassword" type="password" placeholder="Password confirm" required>
        <input type="submit" value="Send">
    </form>
</body>

</html>

<?php
require('../server/connection.php');

if ($_POST) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    try {
        if (strcmp($password, $confirmPassword) !== 0) {
            throw new Error('The password doesnt match');
        }

        $passwordHash = hash('sha256', $password);

        $sql = "INSERT INTO user (username, password) VALUES ('$username', '$passwordHash');";
        $query = $client->prepare($sql);
        $query->execute();
    } catch (Throwable $errno) {
        $class = "box-error";
        $message = $errno->getMessage();

        echo "<h1 class=$class>$message</h1>";
    }
}
