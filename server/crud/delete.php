<?php

include(__DIR__ . '../../connection.php');

$homeworkId = $_POST['homeworkId'];

try {
    $sql = "DELETE FROM homework WHERE id_homework='$homeworkId'";

    $query = $client->prepare($sql);
    $query->execute();

    echo json_encode("Homework deleted");
} catch (\PDOException $pdoerr) {
    echo json_encode($pdoerr->getMessage());
}
