<?php

session_start();
include "connection.php";
$user_id1=$_GET["id"];
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$user_id2 = $_SESSION["id"];
$status =1;
$query = "DELETE FROM friends WHERE (user_id1=? or user_id1= ?) AND (user_id2=? OR user_id2= ?) AND status = ?";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssss", $user_id1, $user_id2, $user_id1, $user_id2, $status);
$stmt->execute();

$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;


} else{
    die("no user data");
}

?>