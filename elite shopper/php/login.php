<?php
	session_start();
	include("connection.php");
	
	if (isset($_POST) && !empty($_POST)){
		$email= $_POST['email'];
		$password = hash('sha256', $_POST['password']);
		
	//check if it's user 
	$query = "select * from users where email = $email and password =$password";
	$stmt = $connection->prepare($query);
	$stmt->bind_param("ss",$email, $password);
	$stmt->execute();
	$result = $stmt->get_result();
	if($result->num_rows>0){
		while($user_data = $result->fetch_assoc()){
			if ($user_data['email']===$email &&$user_data['password']===$password){
				$_SESSION['id']=$user_data['id'];
				$_SESSION['first_name'] =$user_data['first_name'];
				$_SESSION['last_name'] = $user_data['last_name'];
				$stmt->close();
				$connection->close();
				header("location:../shop.php");
				die;
				}else{
					header("location:../index.php");
				}
			}
		}else{
		//check if it's retailer
        $query2 = "select * from retailers where email = ? and password =?";
	    $stmt2 = $connection->prepare($query);
		$stmt2->bind_param("ss",$email, $password);
		$stmt2->execute();
		$result2 = $stmt2->get_result();
		if($result2->num_rows>0){
			while($retailer_data = $result->fetch_assoc()){
				if ($retailer_data['email']===$email && $retailer_data['password'] ===$password ){
				$_SESSION['id'] = $retailer_data['id'];
				$_SESSION['name'] = $retailer_data['name'];
			
				$stmt->close();
				$connection->close();
				header("location:../addToStore.php");
				die;
				}else{
					header("location:../login-page.php");
				}
			}
    }
}}else {
	echo 'failed to login';
}


?>