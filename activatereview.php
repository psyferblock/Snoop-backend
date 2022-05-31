<?php

include("connection.php");

$user_id=$_POST["user_id"];
$review_id=$_POST["review_id"];
// $accepted=$_POST["accepted"];

// $email = $_POST["email"];
// $full_name = $_POST["full_name"];
// $password = hash("sha256", $_POST["password"]);


//update happens here
$query = $mysqli->prepare("UPDATE reviews SET status= 1 WHERE review_id = ? ");
$query->bind_param("i",$review_id);
$query->execute();
$query->store_result();
$query->bind_result($user_id);
$query->fetch();
$response=[];
$response ["success"]=true;

// condition for user to sign in 

echo json_encode($response);
