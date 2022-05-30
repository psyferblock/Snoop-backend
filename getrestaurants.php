<?php
include("connection.php");

// api that gets all restaurants with avvg rating of each
$user_id = $_POST["user_id"];
$email = $_POST["email"];

// TODO validate email and id
$query = $mysqli->prepare("SELECT  r.id,r.rest_name,r.cover_image_uri, AVG(v.rating_score) avg from restaurants r LEFT JOIN reviews v 
ON r.id = v.restaurants_restaurant_id
GROUP BY r.id ");

// $query ->bind_param("iss",$id,$rest_name,$img_uri);
$query->execute();
$array = $query->get_result();
$response = [];


while($resto = $array->fetch_assoc()){
    $response[] = $resto;
} 

echo json_encode($response);
?>