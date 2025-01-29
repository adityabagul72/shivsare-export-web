<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare the SQL statement
    $sql = "INSERT INTO 'messages' (firstname, lastname, email, message) 
            VALUES ('$firstname', '$lastname', '$email', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection after the query is done
    $conn->close();
}
?>
