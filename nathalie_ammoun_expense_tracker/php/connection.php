<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "expense_tracker_db";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Failed");
}
