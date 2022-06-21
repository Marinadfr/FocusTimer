<!DOCTYPE html>
<html lang="en">

<?php
include(__DIR__ . '../../server/connection.php');

$rows = countRows($client, $_SESSION['id']);

$pages = ceil($rows / 3);


if ($pages >= 2) {
    for ($index = 1; $pages >= $index; $index++) {
        echo "<a href=?page=" . $index . ">$index</a>" . " ";
    }
}

?>

</html>