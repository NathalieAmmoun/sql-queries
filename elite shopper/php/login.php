<?php
	session_start();
	include("connection.php");
	//retrieve info
	if (isset($_POST['email']) && $_POST['email']!=""){
		$email= $_POST['email'];
	} else{
			die("enter valid email");
		}
		if (isset($_POST['password']) && $_POST['password']!=""){
			$password = hash('sha256', $_POST['password']);
		}
		else{
			die("enter password");
	}	
	
	//select from users table


	$query = "SELECT * FROM users WHERE email = ? and password = ?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss",$email, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	while($user_data = $result->fetch_assoc()){
		$_SESSION['uid']=$user_data['id'];
		$_SESSION['first_name'] =$user_data['first_name'];
		$_SESSION['last_name'] = $user_data['last_name'];
		
	}

	//select from retailers table
	
	$query2 = "SELECT * FROM retailers WHERE email = ? and password = ? ";
	$stmt2 = $connection->prepare($query2);
	$stmt2->bind_param('ss',$email, $password);
	$stmt2->execute();
	$result2 = $stmt2->get_result();	
	while($retailer_data = $result2->fetch_assoc()){
		$_SESSION['rid']=$retailer_data['id'];
		$_SESSION['name'] = $retailer_data['name'];
	}
	
	if ($_SESSION['uid'] == "" && $_SESSION['rid']==""){	//if user not found in both tables
		die("email or password incorrect");
	}elseif($_SESSION['uid'] != "" && $_SESSION['rid']!=""){	//if user is found in both tables
		header("location: ../addToStore.php");
	}elseif($_SESSION['uid'] != ""){		//if user is a buyer
		header("location: ../shop.php");
	}elseif($_SESSION['rid'] != ""){		//if user is a seller
		header("location: ../addToStore.php");
	}

?>