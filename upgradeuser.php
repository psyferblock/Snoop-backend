<?php
include("connection.php");

$email = $_POST["email"];
$full_name = $_POST["full_name"];
$password = hash("sha256", $_POST["password"]);

//update happens here
$upgrade = $mysqli->prepare("UPDATE users SET status='1' WHERE email = ? AND password = ? and full_name=?");
$upgrade->bind_param("sss", $full_name, $email, $password);
$upgrade->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($user_type);
$query->fetch();
$response=[];
$response ["success"]=true;

// condition for user to sign in 

echo json_encode($response);
