<?php  
include("connection.php");

$user_id = $_POST["user_id"];

// TODO make sure an admin is the person requesting
$query=$mysqli->prepare("SELECT * FROM reviews WHERE status=0");
// $query->bind_param("i", $user_id);

$query->execute();
$array=$query->get_result();
$response=[];

while($review = $array->fetch_assoc()){
    $response[] = $review;
}

echo json_encode($response);
?>