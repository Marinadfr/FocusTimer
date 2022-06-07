<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
</head>

<body>
    <?php
    session_start();

    if (!isset($_SESSION['role'])) {
        header("Location: http://localhost/FocusTimer/views/login.php");
    }

    if ($_SESSION['role'] !== 1) {
        header("Location: http://localhost/FocusTimer/views/login.php");
    }
    ?>

    <h1>Backoffice top SECREEET</h1>
    <a href="./server/session.php">Log out</a>
</body>

</html>