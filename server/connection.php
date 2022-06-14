<?php
$hostname = "localhost";
$db = "focusdb";
$username = "root";
$password = "";

$dsn = "mysql:host=$hostname;dbname=$db";


try {
    $client = new PDO($dsn, $username, $password);
} catch (PDOException $errno) {
    echo "Failed to connect" . $errno;
};
