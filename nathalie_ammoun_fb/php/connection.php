<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: *");
$server = "localhost";
$username = "root";
$password = "";
$dbname = "cool_admin_db";

$connection = new mysqli($server, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Failed");
}
