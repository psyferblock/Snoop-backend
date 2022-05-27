// sign up of user
// receive: full name, email, gender, dob,password to hash
// we make user type not admin by default



// charbel example, to be edited

<?php

include("connection.php");

$title = $_POST["title"];
$desc = $_POST["description"];
$points = $_POST["pts"];
$is_done = 0;

$query = $mysqli->prepare("INSERT INTO todos(title, description, point, is_done) VALUES (?, ?, ?, ?)");
$query->bind_param("ssii", $title, $desc, $points, $is_done);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>