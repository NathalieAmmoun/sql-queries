<?php
session_start();
include "connection.php";
if(isset($_SESSION['id']) && $_SESSION['id']!=""){
    $id = $_SESSION['id'];
    $query = "SELECT c.name as category, SUM(e.amount) as amount FROM expenses e, categories c WHERE e.user_id=? AND e.category_id = c.id GROUP BY e.category_id;";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cat_amm = [];
    while($row = $result->fetch_assoc()){
        $cat_amm[] = $row;
}
$json = json_encode($cat_amm, JSON_PRETTY_PRINT);
echo $json;}
else{
    die("no user data");
}
?>