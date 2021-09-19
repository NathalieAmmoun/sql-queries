<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "cool_admin_db";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Failed");
}
