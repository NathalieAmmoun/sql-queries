<?php
session_start();
include "connection.php";
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
$id = $_SESSION["id"];
$query = "SELECT * FROM expenses WHERE user_id=?";
$stmt = $connection->prepare($query);
$stmt->bind_param("s", $id);
$stmt->execute();
$result = $stmt->get_result();
$temp_array = [];
while($row = $result->fetch_assoc()){
    $temp_array[] = $row;

}
$json = json_encode($temp_array, JSON_PRETTY_PRINT);
echo $json;}
else{
    die("no user data");
}
?>