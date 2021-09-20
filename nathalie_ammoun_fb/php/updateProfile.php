<?php
header("Access-Control-Allow-Origin: *");
session_start();
include "connection.php";

if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$id = $_SESSION["id"];
$first_name = $_POST["firstName"];
$last_name= $_POST["lastName"];
$dob=$_POST["dob"];
$gender = $_POST["gender"];

$query = "UPDATE users SET first_name = ?, last_name = ?, dob= ?, gender = ? where id = ?";
$obj = $connection->prepare($query);
$obj->bind_param("sssss", $first_name, $last_name, $dob, $gender, $id);
$obj->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;
} else{
    die("no user data");
 }
?>