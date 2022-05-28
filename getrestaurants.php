<?php
include("connection.php");

// api that gets restaurants 

$query = $mysqli->prepare("SELECT rest_name,cover_image_url from restaurants");
$query ->bind_param("i",$id);
$query->execute();
$array=$query->get_result()
$response=[];
while ( $together = $array->fetch_assoc()){
    $response[]=$together;
};

$json=json_encode($response);

?>