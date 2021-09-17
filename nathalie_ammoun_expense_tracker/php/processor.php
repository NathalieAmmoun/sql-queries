<?php
session_start();
include "connection.php";

if (isset($_POST["item_name"]) && $_POST["item_name"]!=""){
    $item_name = $_POST["item_name"];
}else {echo("item doesn't have name");}

if (isset($_POST["amount"]) && $_POST["amount"]!=""){
    $amount = $_POST["amount"];
}else {echo("enter amount");}

if (isset($_POST["date"]) && $_POST["date"]!=""){
    $date = $_POST["date"];
    $time = strtotime($birthday);
    $newformat = date('Y-m-d',$time);
    $currentDate = date("Y-m-d");
}else {echo("enter valid date");}

if (isset($_POST["category"]) && $_POST["category"]!=""){
    $category = $_POST["category"];
}else {echo("enter category");}

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
} else{die("please login to proceed");}

    $query = "INSERT INTO expenses (name, amount, date, user_id, category_id) VALUES (?,?,?,?,?)";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss",$name, $user_id);
	$stmt->execute();
	$result = $stmt->get_result();
    
    $result.close();