<?php
session_start();
include "connection.php";

if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$id = $_SESSION["id"];
$first_name = $_POST["first_name"];
$last_name= $_POST["last_name"];
$dob=$_POST["dob"];
$gender = $_POST["gender"];

$query = "UPDATE users SET first_name = ?, last_name = ?, dob= ?, gender = ? where id = ?";
$obj = $connection->prepare($query);
$obj->bind_param("sssss", $first_name, $last_name, $dob, $gender, $id);
$obj->execute();

$response = [];
$response["first_name"] = $first_name;
$response["last_name"] =$last_name;
$response["dob"] = $dob;
$response["gender"]= $gender;

$response_json = json_encode($response);
echo $response_json;
} else{
    die("no user data");
 }
?>