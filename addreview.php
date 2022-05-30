

<?php
 include("connection.php");

// api to add the restaurant features by admin 

 $id=$_GET["restaurant_id"];
 $user_id=$_GET["user_id"];
 $review=$_GET["review_text"];
 $rating=$_GET["rating_score"];

//  the query !

 $query= $mysqli->prepare("INSERT into reviews (review_text,rating_score) values( ?,?) where restaurants_restaurant_id=$id and users_user_id=$user_id");
 $query->bind_param("ss",  $review, $rating);
 $query->execute();
 $response = [];
 $response["success"] = true;

 echo json_encode($response);

?>