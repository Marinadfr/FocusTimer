<?php

function reader(\PDO $client, $userId, $params)
{
    //LIMIT :start, :rows 
    $sql = "SELECT id_homework, text FROM homework WHERE id_user='$userId' LIMIT :start, :rows";
    $query = $client->prepare($sql);

    $query->bindParam(':start', $params['start'], PDO::PARAM_INT);
    $query->bindParam(':rows', $params['rows'], PDO::PARAM_INT);

    $query->execute();

    return $query->fetchAll();
}

function findByUser(\PDO $client, $username)
{
    $sql = "SELECT id_user, username FROM user WHERE username='$username'";
    $query = $client->prepare($sql);

    $query->execute();

    return $query->fetchAll();
}

function countRows(\PDO $client, $userId)
{
    $sql = "SELECT * FROM homework WHERE id_user='$userId'";
    $query = $client->prepare($sql);
    $query->execute();

    return $query->rowCount();
}
