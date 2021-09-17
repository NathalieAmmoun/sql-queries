<?php 
session_start();
include "connection.php";

$cat_id = $_GET["id"];
$catName = $_POST["name"];

$query = "UPDATE categories SET name = ? where id = ?";
$obj = $connection->prepare($query);
$obj->bind_param("ss", $catName, $cat_id);
$obj->execute();
$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;
?>