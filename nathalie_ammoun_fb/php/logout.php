<?php
session_start();
include "connection.php";
unset($_SESSION["id"]);
unset($_SESSION["first_name"]);
unset($_SESSION["last_name"]);
header("Location:../login.php");
?>