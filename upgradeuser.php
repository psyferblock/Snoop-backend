<?php
include("connection.php");

// the variables
$user_id=$_POST["user_id"];
$target_id=$_POST["target_id"];

// the query 
$user_query = $mysqli->prepare("SELECT user_type from users where user_id=? AND user_type=1");
$user_query->bind_param("i",$user_id);
$user_query->execute();
$user_query->store_result();
$num_rows = $user_query->num_rows;
$response=[];


if ($num_rows == 0) {
    $response["response"] = "You are not an admin, you can't upgrade users 😊";
} else {
    $query = $mysqli->prepare("UPDATE users SET user_type= 1 - user_type WHERE user_id =?");
    $query->bind_param("i",$target_id);
    $query->execute();
    // $query->store_result();
    // $query->bind_result($user_type);
    // $query->fetch();
    $response ["success"]=true;
}

echo json_encode($response);
?>
