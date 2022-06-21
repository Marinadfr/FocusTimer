<?php
session_start();

$username = $_SESSION['username'];

if (!isset($username)) {
  header("Location:./views/login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />

  <!--Icono de pagina-->
  <link rel="shortcut icon" href="./icon.png" />

  <!--CSS-->
  <link rel="stylesheet" href="./styles/index.css" />

  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Coming+Soon&family=Gentium+Plus&family=Truculenta:opsz,wght@12..72,900&display=swap" rel="stylesheet">

  <title>FocusTimer</title>
</head>
<!------------------------------------------------------------------------------------------------>

<body>
  <navbar>
    <div class="log-out">
      <p><a href="./server/session.php">Log out</a></p>
    </div>
  </navbar>


  </div>
  <div>
    <?php

    echo '<h1 id="welcome">' . "Welcome, $username!" . '</h1>';
    echo "<h2>Time to focus!</h2>";
    echo "<h3>(developing timer)</h3>";

    ?>

    <?php
    include(__DIR__ . '/views/inputs.php');
    include(__DIR__ . '/views/list.php');
    ?>

  </div>

  <script>
    let body = document.querySelector("body");
    body.style.backgroundImage = `url("./views/uploads/${localStorage.getItem('background')}")`;
  </script>

  <script>
    //!abstraer en un archivo externo

    /* deleteElement escucha el onclick que emite el botón de borrar homework
      enviando un aviso al server que se borró x nota.
      Removiendo el elemento html <li> correspondiente de esa nota, identificandolo
      con el id como parametro.
    */

    async function deleteElement(id) {
      let element = document.getElementById(`${id}`);

      if (!element) return console.log("Homework don't exists");

      element.remove();

      let data = new FormData();
      data.set('homeworkId', id);

      let response = await fetch('http://localhost/FocusTimer/server/crud/delete.php', {
        method: 'POST',
        body: data,
      });

      let body = await response.json();
      console.log(body);

    }
  </script>

  <script>
    setTimeout(() => {
      document.getElementById("temporalMessage").remove();
    }, 1000);
  </script>

  <!---mushroom gif--->


</body>

</html>