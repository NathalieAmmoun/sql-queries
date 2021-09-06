<?php
session_start();
include "connection.php";

if(isset($_POST["name"]) && $_POST["name"] != "" && strlen($_POST["name"]) >= 3) {
    $name = $_POST["name"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["email"]) && $_POST["email"] != "" ) {
    $email = $_POST["email"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["phone"]) && $_POST["phone"] != "" ) {
    $phone = $_POST["phone"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["confirmPassword"]) && $_POST["confirmPassword"] != "" ) {
    $confirmPassword = $_POST["confirmPassword"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["city"]) && $_POST["city"] != "" ) {
    $city = $_POST["city"];
}else{
    die ("Enter a valid input");
}


$sql1="Select * from retailers where email=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
$sql2 = "INSERT INTO `retailers` (`name`, `phone`, `email`, `password`, `city`) VALUES (?, ?, ?, ?, ?);"; #add the new retailer to the database
$hash = hash('sha256', $password);
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("sssss", $name, $phone, $email, $hash, $city);
$stmt2->execute();
$result2 = $stmt2->get_result();

$_SESSION["name"] = $name;
header('location: ../addToStore.php');
}
else{
    $_SESSION["flash"] = "This email is taken";
    header('location: ../register-shop.php');
}
?>