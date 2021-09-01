<?php
	session_start();
	include("connection.php");

	if(isset($_POST["first_name"]) && $_POST["first_name"] != ""){
		$first_name = $_POST["first_name"];
		$_SESSION['first_name'] = $first_name;
	}else{
		die("problem user name");
	}
	if(isset($_POST["last_name"]) && $_POST["last_name"] != ""){
		$last_name = $_POST["last_name"];
		$_SESSION['last_name'] = $last_name;
	}else{
		die("problem last name");
	}
	if(isset($_POST['gender']) && $_POST["gender"] != ""){
		$gender = $_POST['gender'];
	}else{
		die("problem gender");
	}
	if(isset($_POST["email"]) && $_POST["email"] != ""){
		$email = $_POST["email"];
	}else{
		die("problem email");
	}
	if(isset($_POST["pass"]) && $_POST["pass"] != ""){
		$password = hash('sha256', $_POST['pass']);
	}else{
		die("problem pass");
	}
	$id =0;
	$x = $connection->prepare("INSERT INTO users (id, first_name, last_name, gender, email, password) VALUES (?, ?, ?, ?, ?, ?)");
	$x->bind_param("isssss", $id, $first_name, $last_name, $gender, $email, $password);
	$x->execute();
	$x->store_result();
	$x->close();
	$connection->close();
	header("location:index.php");
	
	

	


?>