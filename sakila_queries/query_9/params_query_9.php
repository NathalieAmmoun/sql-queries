<?php

include "connection.php";

$rental_year = (int)readline("Enter Year:");

$query = "SELECT c.first_name, c.last_name, count(i.film_id) as film_num,EXTRACT(year from r.rental_date) as rental_year FROM rental r join inventory i ON r.inventory_id = i.inventory_id JOIN customer c ON c.customer_id=r.customer_id
WHERE EXTRACT(year from r.rental_date) = $rental_year GROUP BY c.customer_id ORDER BY film_num DESC LIMIT 3";
$stmt = $connection->prepare($query);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
	print_r($row);
}
?>
