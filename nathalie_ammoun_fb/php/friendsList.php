<?php
session_start();
include "connection.php";
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$id = $_SESSION["id"];
$status =1;
$query = "SELECT DISTINCT u.id, u.first_name, u.last_name 
            FROM users u, friends f 
            WHERE (u.id = f.user_id1 OR u.id = f.user_id2) 
            AND (f.user_id1 =? OR f.user_id2=?) 
            AND f.status =? AND u.id != ?;";
$stmt = $connection->prepare($query);
$stmt->bind_param("ssss", $id, $id,$status, $id);
$stmt->execute();
$result = $stmt->get_result();
$friends=[];
while($row = $result->fetch_assoc()){
    $friends[] = $row;
}
$json = json_encode($friends, JSON_PRETTY_PRINT);
echo $json;
 }
 else{
    die("no user data");
}
?>