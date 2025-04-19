<?php
$servername = "localhost";  
$username = "root";  
$password = "12345";  
$database = "testgenius";  
$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
