<?php

$host = 'localhost';  
$username = 'root';
$password = 'your_new_password';
$dbname = 'shivsar';  

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connection successful!";
}

?>
