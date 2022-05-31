<?php
include("connection.php");

// api to add the restaurant features by admin 
$name = $_POST["restaurant_name"];
$address = $_POST["address"];
$description = $_POST["description"];

$random_string = generateRandomString();
$cover_uri_for_save = $_SERVER['DOCUMENT_ROOT'] . '/snoop/Snoop-backend/restimages/' . $random_string . '.png';
$cover_uri_for_uri = '/Snoop-backend/restimages/' . $random_string . '.png';

echo $cover_uri_for_save;

// get image base64 data and save it in restimages
$imgData = str_replace(' ', '+', $_POST["cover_image"]);
$imgData =  substr($imgData, strpos($imgData, ",") + 1);
$imgData = base64_decode($imgData);
// Path where the image is going to be saved
$filePath = $cover_uri_for_save;
// Write $imgData into the image file
$file = fopen($filePath, 'w');
fwrite($file, $imgData);
fclose($file);


//  the query !

$query = $mysqli->prepare("INSERT into restaurants (rest_name,address,description,cover_image_uri) values( ?,?,?,?)");
$query->bind_param("ssss", $name, $address, $description, $cover_uri_for_uri);
$query->execute();
$response = [];
$response["success"] = true;

echo json_encode($response);
