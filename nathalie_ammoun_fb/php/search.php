<?php
session_start();
include "connection.php";

$keyword =$_POST["keyword"];

$substr='%' .$keyword. '%';
if(isset($_SESSION['id']) && $_SESSION['id']!="" ){
$id = $_SESSION["id"];
if ($keyword!=""){
$query = "SELECT DISTINCT u.id, u.first_name, u.last_name, u.dob, u.gender 
FROM users u 
WHERE NOT EXISTS( SELECT * FROM friends f WHERE (f.user_id1 = u.id or f.user_id2 =u.id) AND (f.user_id1 =? or f.user_id2=?)) 
AND NOT EXISTS( SELECT * FROM user1_blocked_user2 b WHERE (b.user_id1 = u.id or b.user_id2 =u.id) AND (b.user_id1 =? OR b.user_id2=?)) 
AND (u.first_name LIKE ? OR u.last_name LIKE ?) AND u.id !=?;";
$stmt = $connection->prepare($query);
$stmt->bind_param("sssssss", $id, $id, $id, $id, $substr, $substr, $id);
$stmt->execute();
$result = $stmt->get_result();
$users=[];
while($row = $result->fetch_assoc()){
    $users[]=$row;
}}else{
    $users=[];
}
$json = json_encode($users, JSON_PRETTY_PRINT);
echo $json;
}
else{
   die("no user data");
}
?>