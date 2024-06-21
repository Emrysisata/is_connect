<?php
// forgot_password.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {b 
    $email = $_POST["email"];
    $servername= "servername";
    $username= "username"
    $password = "password";
    $dbname = "database_name";

    // Create connection to the database
    $conn = new mysqli($email, $servername, $username, $password, $dbname);

    // this is to Check if the connection is successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the token and email into the database 
    $sql = "INSERT INTO password_reset (email, token, expiry_time) VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR))";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Send email with the reset link
    $to = $email;
    $subject = 'Reset your password';
     $message = 'Click on this link to reset your password: http://softytarawally267@gmail.com/reset_password.php?email=' . urlencode($email) . '&token=' . $token;
    $headers = 'From: your_email@example.com' . "\r\n" .
               'Reply-To: your_email@example.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

    echo "An email has been sent to you with instructions to reset your password.";
}
?> 