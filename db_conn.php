<?php  

$server = getenv('server');
$db_username = getenv("db_username");
$db_password = getenv("db_password");


$con = mysqli_connect($server, $db_username, $db_password, $db_username);


?>