// get restaurant of a certain id, with reviews of restaurant
// this api receives a restaurant id, to get all relevant data and reviews from database, and return those reviews



<?php echo '<p>Hello World</p>'; 

$id=$_GET["id"];
$review_id=$_GET["id"];


$query=$mysqli->query("SELECT review_text,rating_score from reviews
JOIN restaurants ON restaurants.id=restaurants_restaurant_id")



?>