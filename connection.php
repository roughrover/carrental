<?php
$host = "db";  // This must match the service name of the database container in docker-compose.yml
$username = "user";
$password = "userpass";
$database = "carrental";

$con = new mysqli($host, $username, $password, $database);

// Optional: handle connection error
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
?>

