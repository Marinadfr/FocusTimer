<?php
include(__DIR__ . '../../connection.php');

$userId = $_POST['userId'];
$username = $_POST['username'];

try {
    $sql = "UPDATE user SET username='$username' WHERE id_user='$userId';";
    $query = $client->prepare($sql);
    $query->execute();

    echo json_encode(true);
} catch (\PDOException $pdoerr) {
    echo json_encode(false);
}
