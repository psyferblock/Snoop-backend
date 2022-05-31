<?php
include("connection.php");

// api to add the restaurant features by admin 

 $id=$_POST["restaurant_id"];
 $user_id=$_POST["user_id"];
 $review=$_POST["review_text"];
 $rating=$_POST["rating_score"];
 $status=0;

//  the query !

 $query= $mysqli->prepare("INSERT into reviews (review_text,rating_score,restaurants_restaurant_id,users_user_id,status) values( ?,?,?,?,?) ");
 $query->bind_param("ssiii", $review, $rating, $id, $user_id,$status);
 $query->execute();
 $response = [];
 $response["success"] = true;

 echo json_encode($response);
?>