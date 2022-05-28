
<?php

include("connection.php");

// api to add new user data 

$full_name=$_GET("full_name");
$email=$_GET("email");
$gender=$_GET("gender");
$dob=$_GET("dob");
$password=$_GET("password");
$user_type=$_GET("user_type");

// the condidtion for sign up

$query = $mysqli->prepare("SELECT id from users where email = ? AND password = ?");
$query->bind_param("ss", $email, $password);
$query->execute();
$query->store_result();
$num_rows = $query->num_rows;
$query->bind_result($id);
$query->fetch();
$response = [];

if ($num_rows == 1) {
    $response["response"] = "account already used";
} else {
    query=$mysqli->prepare("INSERT into users(full_name,email,gender,date_of_birth,password,user_type) values (?,?,?,?,?,?)");
    $query->bind_param("ssissi", $full_name, $email, $gender, $dob,$password,$user_type);
    $querry-> execute();
    $response=[];
    $response["success"]=true;

}

// the query once the condition is met 



?>