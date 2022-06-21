<?php

function creator(\PDO $client, $text, $userId)
{
    $sql = "INSERT INTO homework (text, id_user) VALUES ('$text', '$userId')";
    $query = $client->prepare($sql);
    $query->execute();
}
