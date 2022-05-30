<?php
include("connection.php");

// api that gets restaurants 
$user_id = $_POST["user_id"];
$email = $_POST["email"];
// TODO validate email and id
// TODO get avg rating of restaurant

// WHERE r.id = v.review_id
// review_id	review_text	rating_score	status	users_user_id	restaurants_restaurant_id
// AVG(v.rating_score)
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