<?php
// reading the data sent to the server for account password recovery
$user_email = $_POST["email_to_recover"];

// These are info needed to connect to the database
$databaseServerName = "localhost";
$databaseUserName = "username";
$databaseUserPassword = "password";
$databaseName = "your_database_name";

// Create connection
$conn = new mysqli($databaseServerName, $databaseUserName, $databaseUserPassword, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Attempt to connect to the database has failed: " . $conn->connect_error);
}

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM CREDENTIAL WHERE EMAIL = ?");
$stmt->bind_param("s", $user_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // To show that the given email is not associated with any account on this platform
    echo "No account associated with this email.";
} else {
    // Send mail to the email account provided
    $to = $user_email;
    $subject = "Password Recovery";
    $message = "Click on this link to reset your password: [insert reset link here]";
    $headers = "From: webmaster@example.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Check your email for a link to reset your password. If it doesn’t appear within a few minutes, check your spam folder.";
    } else {
        echo "Failed to send recovery email.";
    }
}

$stmt->close();
$conn->close();
?>
