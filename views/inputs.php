<!DOCTYPE html>
<html lang="en">

<body>

    <form method="POST">
        <br />
        <h1>To do list:</h1>
        <input type="text" name="text" minlength="1" placeholder="tasks" autofocus="true">
        <br />
        <br />
        <input type="submit" value="Send">
    </form>

    <?php

    include(__DIR__ . '../../server/connection.php');
    include(__DIR__ . '../../server/crud/create.php');

    if ($_POST) {
        $text = $_POST['text'];

        try {
            if (!$text) {
                throw new Error('field is void');
            }

            creator($client, $text, $_SESSION['id']);

            echo '<p id="temporalMessage">Homework created</p>';
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            echo '<p id="temporalMessage">' . "Homework error: $message</p>";
        }
    }

    ?>

</body>

</html>