<?php
include("connection.php");
if (isset($_POST["email"]) && $_POST["email"]!=""){
    $email= $_POST["email"];
} else{
        die("enter valid email");
    }
    if (isset($_POST["password"]) && $_POST["password"]!=""){
        $password = hash("sha256", $_POST["password"]);
        
    }
    else{
        die("enter password");
}
$query = "SELECT * FROM users WHERE email = ? and password = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss",$email, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	$user_data = $result->fetch_assoc();
    
    if(!empty($user_data)){
        session_start();
        $_SESSION["id"] = $user_data["id"];
        $_SESSION["firstName"] =$user_data["first_name"];
		$_SESSION["lastName"] = $user_data["last_name"];
        header("location:../index.php");
    }else{
    $result->close();
  header("location:../login.php");}
?>