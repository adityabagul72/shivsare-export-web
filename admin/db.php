<?php

$host = 'sql101.infinityfree.com';  
$username = 'if0_38281362';
$password = 'Aditya9284';
$dbname = 'if0_38281362_shivsar';  

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
