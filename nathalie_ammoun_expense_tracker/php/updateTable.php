<?php 
session_start();
include "connection.php";

$item_id = $_GET["id"];
$itemName = $_POST["item_name"];
$amount = $_POST["amount"];
$category_id = $_POST["category"];
$query = "UPDATE expenses SET name = ?, amount = ?, category_id = ? where id = ?";
$obj = $connection->prepare($query);
$obj->bind_param("ssss", $itemName, $amount, $category_id, $item_id);
$obj->execute();
$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;
?>