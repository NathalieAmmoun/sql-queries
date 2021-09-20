<?php
header("Access-Control-Allow-Origin: *");
session_start();
include "connection.php";
$user_id2=$_GET["id"];
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$user_id1 =$_SESSION["id"];
$query = "DELETE FROM friends WHERE (user_id1=? or user_id1= ?) AND (user_id2=? OR user_id2= ?)";
$stmt = $connection->prepare($query);
$stmt->bind_param("ssss", $user_id1, $user_id2, $user_id1, $user_id2);
$stmt->execute();

$query2 = "INSERT INTO `user1_blocked_user2`(`user_id1`, `user_id2`) VALUES (?,?)";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param("ss", $user_id1,$user_id2);
$stmt2->execute();


$response = [];
$response["success"] = 1;

$response_json = json_encode($response);
echo $response_json;


} else{
  die("no user data");
}

?>