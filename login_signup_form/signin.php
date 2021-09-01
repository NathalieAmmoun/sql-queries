<?php
	session_start();
	include("connection.php");
	
	if (isset($_POST) && !empty($_POST)){
		$first_name = $_POST["first_name"];
		$last_name = $_POST["last_name"];
		$email= $_POST['email'];
		$password = hash('sha256', $_POST['pass']);
		}
	$query = "select * from users where email = ? and password =?";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss",$email, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows>0){
		while($user_data = $result->fetch_assoc()){
			if ($user_data['email']===$email && $user_data['password'] ===$password ){
				$_SESSION['first_name'] = $first_name;
				$_SESSION['last_name'] = $last_name;
				$stmt->close();
				$connection->close();
				header("location: index.php");
				die;
				}else{
					echo "Failed To Login :( ";
				}
			}
			
			 
	}
	
	header("Location:index.php");

?>