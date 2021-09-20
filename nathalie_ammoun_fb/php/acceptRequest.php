<?php
header("Access-Control-Allow-Origin: *");
session_start();
include "connection.php";
$user_id1=$_GET["id"];
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$user_id2 = $_SESSION["id"];
$status=1;
$add_notification=0;
$accept_notification=1;
$query = "UPDATE friends SET status=?, add_notification=?, accept_notification=? WHERE user_id1=? AND user_id2=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssss", $status,$add_notification, $accept_notification, $user_id1, $user_id2);
$stmt->execute();
$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;

} else{
   die("no user data");
}

?>