<!DOCTYPE html>
<html lang="en">

<body>

    <?php
    include(__DIR__ . '../../server/connection.php');
    include(__DIR__ . '../../server/crud/read.php');

    $currentPage = 1;

    if (isset($_GET["page"])) {
        $currentPage = $_GET["page"];
    }

    $rows = 3;
    $start = ($currentPage - 1) * $rows;

    $params["start"] = $start;
    $params["rows"] = $rows;

    $homeworks = reader($client, $_SESSION['id'], $params);

    ?>

    <ul>
        <?php
        for ($index = 0; count($homeworks) > $index; $index++) {
            $homeworkId = $homeworks[$index]['id_homework'];
            echo '<div id="' . "$homeworkId" . '">';
            echo '<li>' . $homeworks[$index]['text'] . '</li>';
            echo '<button type="submit" onclick="' . "deleteElement($homeworkId)" . '">x</button>';
            echo '</div>';
        }

        ?>
    </ul>
    <div>
        <?php
        include(__DIR__ . '/pagination.php');
        ?>

    </div>


</body>

</html>