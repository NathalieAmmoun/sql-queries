<?php
// Include the database configuration file
session_start();
include 'connection.php';
$statusMsg = '';
// File upload path
$targetDir ="../uploads/";
$fileName = $_FILES["img"]["name"];
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$retailer_id = $_SESSION['rid'];
if(isset($_POST["item_name"]) && $_POST["item_name"] !=""){

    $name=$_POST["item_name"];
}else{ echo "enter valid item name";}

if(isset($_POST["item_description"]) && $_POST["item_description"] !=""){
    $description=$_POST["item_description"];
}else{ echo "enter valid item description";}
//print(isset($_FILES["img"]));
if(isset($_POST) && isset($_FILES["img"])){
    
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $now = date('y-m-d h:i:s');
            $insert = "INSERT into products (name,description,image_url, uploaded_on, retailers_id) VALUES (?,?,?,?,?)";
            $stmt= $connection->prepare($insert);
            $stmt->bind_param("ssssi", $name, $description, $fileName, $now, $retailer_id);
            $stmt->execute();
            if($stmt){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}
// Parse to JSON FILE
$query = "select * from products";
	$stmt = $connection->prepare($query);
	$stmt->execute();
	$result = $stmt->get_result();
    $json_array =array();
	while($products = $result->fetch_assoc()){
			$json_array[]=$products;
        }
    $strJsonContent = json_encode($json_array);
    $myfile = fopen("products.json", "w") or die("Unable to open file!");
    fwrite($myfile, $strJsonContent);
    fclose($myfile);
// Display status message
echo $statusMsg; 
header('location:../addToStore.php')
?>