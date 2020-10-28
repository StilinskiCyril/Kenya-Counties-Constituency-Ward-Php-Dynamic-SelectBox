<?php

$servername = "localhost";
$username = "your mysql user";
$password = "your mysql password";

/*
**replace COUNTIES with your database name below i.e dbname=YOUR DATABASE NAME
*/
try {
    $conn = new PDO("mysql:host=$servername;dbname=COUNTIES", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
