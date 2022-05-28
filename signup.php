
<?php

include("connection.php");

// api to add new user data 

$full_name=$_GET("full_name");
$email=$_GET("email");
$gender=$_GET("gender");
$dob=$_GET("dob");
$password=$_GET("password");
$user_type=$_GET("user_type");

// the query 

$query=$mysqli->prepare("INSERT into users(full_name,email,gender,date_of_birth,password,user_type) values (?,?,?,?,?,?)");
$query->bind_param("ssissi", $full_name, $email, $gender, $dob,$password,$user_type);
$querry-> execute();

$response=[];
$response["success"]=true;
echo json_encode($response);



?>