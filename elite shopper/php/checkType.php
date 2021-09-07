<?php
session_start();
include "connection.php";
//check if the person wants to register as a seller or buyer
if(isset($_POST["user_type"]) && $_POST["user_type"] != "") {
    $user_type = $_POST["user_type"];
    echo $user_type;
    if ($user_type == "r"){
        header('location:../register-shop.php');
    }else{
        header('location:../user-reg.php');
    }
}else{
    echo "failed to connect";
}
?>