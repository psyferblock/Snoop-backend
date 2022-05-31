<?php
include("connection.php");

// $email = $_POST["email"];
// $full_name = $_POST["full_name"];
// $password = hash("sha256", $_POST["password"]);
// $user_type=$
$user_id=$_POST["user_id"];
$target_id=$_POST["target_id"];

$user_query = $mysqli->prepare("SELECT user_type from users where user_id=?")
$user_query->bind_param("i",$user_id);
$user_query->execute();
$response=[];

if ($num_rows == 0) {
    $response["response"] = "User Not Found";

} 
//update happens here

else {
    $query = $mysqli->prepare("UPDATE users SET user_type= 1 WHERE target_id =? AND full_name=?");
    $query->bind_param("isss",$user_type, $full_name, $email, $password);
    $query->execute();
    $query->store_result();
    $query->bind_result($user_type);
    $query->fetch();
    $response ["success"]=true;

}



echo json_encode($response);
