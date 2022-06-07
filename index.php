<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <!--Icono de pagina-->
  <link rel="shortcut icon" href="./icon.png" />

  <!--CSS-->
  <link rel="stylesheet" href="./styles/index.css" />

  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=BIZ+UDGothic:wght@700&display=swap" rel="stylesheet" />

  <title>FocusTimer</title>
</head>
<!------------------------------------------------------------------------------------------------>

<body>
  <div>
    <?php
    session_start();

    $username = $_SESSION['username'];

    if (!isset($username)) {
      header("Location:http://localhost/FocusTimer/views/login.php");
    }

    echo "<h1> Welcome $username </h1>";

    ?>

    <a href="./server/session.php">Log out</a>

  </div>


</body>

</html>