<?php
session_start();
include "connection.php";

if (isset($_POST["item_name"]) && $_POST["item_name"]!=""){
    $item_name = $_POST["item_name"];

}else {die("item doesn't have name");}

if (isset($_POST["amount"]) && $_POST["amount"]!=""){
    $amount = $_POST["amount"];
}else {die("enter amount");}

if (isset($_POST["date"]) && !empty($_POST["date"])){
    $date = $_POST["date"];
    echo $date;
}else {die("enter valid date");}

if (isset($_POST["category"]) && $_POST["category"]!=""){
    $category = $_POST["category"];
    echo $category;
}else {die("enter category");}

if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
} else{header("location:../login.php");}

    $query = "INSERT INTO expenses (name, amount, date, user_id, category_id) VALUES (?,?,?,?,?)";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("sssss", $item_name,$amount,$date, $user_id, $category);
	$stmt->execute();
	$result = $stmt->get_result();
    