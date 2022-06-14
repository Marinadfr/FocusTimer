<!DOCTYPE html>
<html lang="en">

<body>

    <?php
    include(__DIR__ . '../../server/connection.php');
    include(__DIR__ . '../../server/crud/read.php');

    $homeworks = reader($client, $_SESSION['id']);

    ?>

    <ul>
        <?php
        for ($index = 0; count($homeworks) > $index; $index++) {
            $homeworkId = $homeworks[$index]['id_homework'];
            echo '<div id="' . "$homeworkId" . '">';
            echo '<li>' . $homeworks[$index]['text'] . '</li>';
            echo '<button type="submit" onclick="' . "deleteElement($homeworkId)" . '">x</button>';
            echo '</div>';

            //añadir el image_direction
        }
        ?>
    </ul>

</body>

</html>