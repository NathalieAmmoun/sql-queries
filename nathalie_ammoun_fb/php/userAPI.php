<?php
header("Access-Control-Allow-Origin: *");
session_start();
include "connection.php";
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$id = $_SESSION["id"];
$query = "SELECT * FROM users WHERE id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$user=[];
while($row = $result->fetch_assoc()){
    $user[] = $row;
}
$json = json_encode($user, JSON_PRETTY_PRINT);
echo $json;}
else{
    die("no user data");
}
?>