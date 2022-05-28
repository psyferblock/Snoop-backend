
<?php
echo "wut is happening ";



include("connection.php");

echo "include"

$name = $_POST["full_name"];
$email = $_POST["email"];
$results = [
    "name" => $name,
    "email" => $email
];

?>
<!-- 
let data = new FormData();
            data.append('user_id', id);
            axios({
                method: 'post',
                url: 'http://localhost/project/get_restos.php',
                data: data,
            })
            .then(function (response) {
                console.log(response);
                }
            }) -->