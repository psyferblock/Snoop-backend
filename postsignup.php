// sign up of user
// receive: full name, email, gender, dob,password to hash
// we make user type not admin by default



// charbel example, to be edited

<?php

include("connection.php");

$name = $_POST["title"];
$desc = $_POST["description"];
$points = $_POST["pts"];
$is_done = 0;
$id =$_POST["id"]
$name =$_POST["full_name"]
$email=$_POST["email"]
$gender=$_POST["male/female"]
$birth_date=$_POST["dob"]
$password=$_POST["pass"]
$user_type=$_POST["user_type"]

$query = $mysqli->prepare("INSERT INTO users(id,name,email, gender, birth_date,password,user_type) VALUES (?, ?, ?, ?,?,?,?)");
$query->bind_param("ssii",$id,$name,$email, $gender, $birth_date,$password,$user_type);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);

?>