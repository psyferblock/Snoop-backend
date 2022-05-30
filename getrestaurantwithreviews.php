<?php 
 echo $_GET["id"];

include("connection.php");

$id=$_GET["id"];

// the query that will call the reviews and ratings 

$query=$mysqli->prepare("SELECT review_text,rating_score from reviews where status='1' and restaurants_restaurant_id ='?'");

// binding the query executing and calling the json function

$query->bind_param("i", $id);
$query->execute();
$array=$query->get_result();
$response[]=$array->fetch_assoc();
$json=json_encode($response);
echo $json;
?>



