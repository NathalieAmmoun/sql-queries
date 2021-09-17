<?php 
include "connection.php";

if(isset($_POST["firstName"]) && $_POST["firstName"] != "" && strlen($_POST["firstName"]) >= 3) {
    $firstName = $_POST["firstName"];
}else{
    echo ("Enter a valid input");
}

if(isset($_POST["lastName"]) && $_POST["lastName"] != "" && strlen($_POST["lastName"]) >= 3) {
    $lastName = $_POST["lastName"];
}else{
    echo ("Enter a valid input");
}
if(isset($_POST["email"]) && $_POST["email"] != "" ) {
    $email = $_POST["email"];
}else{
    echo ("Enter a valid input");
}
if(isset($_POST["password"]) && $_POST["password"] != "" ) {
    $password = $_POST["password"];
}else{
    echo ("Enter a valid input");
}

if(isset($_POST["confirmPassword"]) && $_POST["confirmPassword"] != "" ) {
    $confirmPassword = $_POST["confirmPassword"];
}else{
    echo ("Enter a valid input");
}
$sql1="SELECT * FROM `users` WHERE email=?"; #Check if the email already exists in the database
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$email);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
if(empty($row)){
    
    $sql2 = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `password`) VALUES (?, ?, ?, ?);"; #add the new user to the database
    $hash = hash('sha256', $password);
    $stmt2 = $connection->prepare($sql2);
    $stmt2->bind_param("ssss", $firstName, $lastName, $email, $hash);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    session_start();
    $id = $connection->insert_id;
    $_SESSION["id"] = $id;
    $_SESSION["firstName"] = $firtName;
    $_SESSION["lastName"] = $lastName;
    header('location: ../index.php');
}
else{
    $_SESSION["flash"] = "This email is taken";
    header('location: ../register.php');
}
?>