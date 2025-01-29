<?php
$servername = "localhost";
$username = "root";
$password = "root"; 
$dbname = `shivsar_export`;  

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  
} else {
    echo "Connected successfully to the database: $dbname";  
}

// Close connection
$conn->close();
?>
