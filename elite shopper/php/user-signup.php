<?php
session_start();
include "connection.php";

if(isset($_POST["first_name"]) && $_POST["first_name"] != "" && strlen($_POST["first_name"]) >= 3) {
    $first_name = $_POST["first_name"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["last_name"]) && $_POST["last_name"] != "" && strlen($_POST["last_name"]) >= 3) {
    $last_name = $_POST["last_name"];
}else{
    die ("Enter a valid input");
}

if(isset($_POST["birthday"]) && $_POST["birthday"] != "") {
    $birthday = $_POST["birthday"];
    $time = strtotime($birthday);
    $newformat = date('Y-m-d',$time);
    $currentDate = date("Y-m-d");

}else{
    die ("Enter a valid input");
}


if(isset($_POST["gender"]) && $_POST["gender"] != "" ) {
    $gender = $_POST["gender"];
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


$sql1="Select * from users where email=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();

if(empty($row)){
$sql2 = "INSERT INTO `users` (`first_name`, `last_name`, `gender`, `phone`, `email`, `password`, `dob`, `city`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);"; #add the new user to the database
$hash = hash('sha256', $password);
$stmt2 = $connection->prepare($sql2);
$stmt2->bind_param("ssisssss",$first_name,$last_name,$gender,$phone,$email,$hash,$newformat,$city);
$stmt2->execute();
$result2 = $stmt2->get_result();

$_SESSION["first_name"] = $first_name;
$_SESSION["last_name"] = $last_name;
$_SESSION["gender"] = $gender;
header('location: ../index.php');
}
else{
    $_SESSION["flash"] = "This email is taken";
    header('location: ../user-reg.php');
}
?>