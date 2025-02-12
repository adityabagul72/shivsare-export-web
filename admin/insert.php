<?php
// Include the database connection file
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    
    // Simple SQL query to insert data into the messages table
    $sql = "INSERT INTO `messages` (firstname, lastname, email, message) 
            VALUES ('$firstname', '$lastname', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message_sent'] = true; // Set session flag
    }

    $conn->close();
    // Redirect back to contact.html
    header("Location: ../contact.html");
    exit();
}
?>
