<?php
include("connection.php");

// the api that gets one resraurant with all its data 
$id = $_GET["id"];

// get resto info
$resto_query = $mysqli->prepare("SELECT id, rest_name, address, description, cover_image_uri, AVG(v.rating_score) avg FROM restaurants r,reviews v WHERE r.id = ?");
$resto_query ->bind_param("i",$id);
$resto_query->execute();
$resto_array = $resto_query->get_result();

// get reviews
$rev_query = $mysqli->prepare("SELECT review_id	,review_text ,rating_score ,status ,users_user_id,restaurants_restaurant_id	FROM reviews v WHERE status=1 AND v.restaurants_restaurant_id=?");
$rev_query ->bind_param("i",$id);
$rev_query->execute();
$rev_array = $rev_query->get_result();

$response[] = $resto_array->fetch_assoc();

while($rev = $rev_array->fetch_assoc()){
    $response[] = $rev;
}

echo json_encode($response);

?>
