<?php
session_start();
$corroborar = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header("Location: ./login.php");
    die();
}

if ($_SESSION['role'] !== 1) {
    header("Location: ./login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice</title>
</head>

<body>

    <h1>Backoffice admin</h1>
    <a href="../server/session.php">Log out</a>

    <div>
        <h2>Change background:</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="background">
            <br />
            <input type="submit" value="Change">
        </form>
    </div>

    <?php
    if ($_FILES) {
        $path = $_FILES['background']['name'];
        $type = $_FILES['background']['type'];
        $size = $_FILES['background']['size'];

        if (!empty($path) || ($size <= 666773)) {

            $directory = $_SERVER['DOCUMENT_ROOT'] . '/FocusTimer/views/uploads/';
            unlink($directory . $_SESSION['background']);

            $_SESSION['background'] = $path;
            move_uploaded_file($_FILES['background']['tmp_name'], $directory . $path);

            echo "<span>" . $_SESSION['background'] . "</span>";
        }
    }

    echo "<br/>";

    include(__DIR__ . '/userTable.php');
    ?>

    <script>
        let currentBackground = document.querySelector("span").innerText;
        localStorage.setItem('background', currentBackground);
    </script>

</body>

</html>