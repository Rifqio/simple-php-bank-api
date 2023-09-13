<?php

$host = "";
$user = "";
$pass = "";
$db   = "";
 
$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
