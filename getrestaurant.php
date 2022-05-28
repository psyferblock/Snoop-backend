<?php
include("connection.php");

$id = $_GET["id"];
// $rest_name=
// $address
// $description
// $cover_image

$query = $mysqli->prepare("select rest_name,address,description,cover_image_url from restaurants where id=?");
$query ->bind_param("i",$id);
$query->execute();
 $json=json_encode($query);
 echo " $json";
?>