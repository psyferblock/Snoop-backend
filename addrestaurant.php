

<?php
 include("connection.php");

// api to add the restaurant features by admin 

 $name=$_GET["restaurant_name"];
 $address=$_GET["address"];
 $description=$_GET["description"];
 $coverImage=$_GET["coverImage"];

 $query= $mysqli->prepare("INSERT into restaurants (rest_name,address,description,cover_image_url) values( ?,?,?,?)");
 $query->bind_param("ssss", $name, $address, $description, $coverImage);
 $query->execute();
 $response = [];
 $response["success"] = true;

 echo json_encode($response);

?>




?>