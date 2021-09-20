<?php
header("Access-Control-Allow-Origin: *");
session_start();
include "connection.php";
$user_id2=$_GET["id"];
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$user_id1 = $_SESSION["id"];
$status=0;
$add_notification=1;
$accept_notification =0;
$query = "INSERT INTO friends (user_id1, user_id2, status, add_notification, accept_notification) VALUES (?,?,?,?,?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssss", $user_id1, $user_id2, $status, $add_notification, $accept_notification);
$stmt->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;
} else{die("no user data");}

?>