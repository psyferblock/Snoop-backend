<?php

include("connection.php");

// variables 

$user_id=$_POST["user_id"];
$review_id=$_POST["review_id"];
$accepted=$_POST["accepted"];


//update happens here
if ($accepted==1){
    $query = $mysqli->prepare("UPDATE reviews SET status= 1 WHERE review_id = ? ");
    $query->bind_param("i",$review_id);
    $query->execute();
    $response=[];
    $response["status"]=true;
    $response["message"]="accepted";
}else{
    $query = $mysqli->prepare("DELETE from reviews where review_id=?");
    $query->bind_param("i",$review_id);
    $query->execute();
    $response=[];
    $response["message"]="deleted";
    
}

echo json_encode($response);
?>