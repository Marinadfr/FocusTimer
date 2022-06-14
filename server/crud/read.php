<?php

function reader(\PDO $client, $userId)
{
    $sql = "SELECT id_homework, text, image_direction FROM homework WHERE id_user='$userId'";
    $query = $client->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}
