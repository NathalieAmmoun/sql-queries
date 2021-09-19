<?php
session_start();
include "connection.php";
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$id = $_SESSION["id"];
$status = 0;
$add_notification=1;
$query = "SELECT u.id, u.first_name, u.last_name 
            FROM users u, friends f 
            WHERE (u.id = f.user_id1) 
            AND (f.user_id2=?) 
            AND f.status =? AND f.add_notification =? AND u.id != ?;";
$stmt = $connection->prepare($query);
$stmt->bind_param("ssss",$id, $status, $add_notification, $id);
$stmt->execute();
$result = $stmt->get_result();
$notifications=[];
while($row = $result->fetch_assoc()){
    $notifications[] = $row;
}
$json = json_encode($notifications, JSON_PRETTY_PRINT);
echo $json;
 }
 else{
    die("no user data");
}
?>