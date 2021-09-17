<?php
session_start();
include "connection.php";
if (isset($_POST["name"]) && $_POST["name"]!=""){
    $name = $_POST["name"];
}else {die("enter category");}
if(isset($_SESSION["id"])){
    $user_id = $_SESSION["id"];
} else{die("please login to proceed");}
    $query = "INSERT INTO categories (name, user_id) VALUES (?,?) ";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss",$name, $user_id);
	$stmt->execute();
	$result = $stmt->get_result();


?>