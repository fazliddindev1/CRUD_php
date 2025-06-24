<?php
$servername = "localhost";
$username = "root";
$password = "03051017f";
$database = "crud_operations";

$connection = mysqli_connect($servername, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
