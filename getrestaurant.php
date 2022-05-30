<?php
include("connection.php");

// the api that gets the resraurant with all its data 

$id = $_GET["id"];

$query = $mysqli->prepare("select rest_name,address,description,cover_image_url from restaurants where id=?");
$query ->bind_param("i",$id);
$query->execute();
$json=json_encode($query);
echo $json;
?>