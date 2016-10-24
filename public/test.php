<?php
/* 

$servername = "127.0.0.1";
$username = "root";
$password = "";

*/
$servername = "127.0.0.1";
$username = "shopcart";
$password = "ToXz8G6zDxhz";


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>