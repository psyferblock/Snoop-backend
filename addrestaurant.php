<?php
include("connection.php");

// api to add the restaurant features by admin 
 $name=$_POST["restaurant_name"];
 $address=$_POST["address"];
 $description=$_POST["description"];
 $cover_image=$_POST["cover_image"];

//  the query !

 $query= $mysqli->prepare("INSERT into restaurants (rest_name,address,description,cover_image_uri) values( ?,?,?,?)");
 $query->bind_param("ssss", $name, $address, $description, $cover_image);
 $query->execute();
 $response = [];
 $response["success"] = true;

 echo json_encode($response);

?>
