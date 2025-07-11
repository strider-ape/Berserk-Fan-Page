<?php
$servername = "localhost";
$db_username = "root";
$db_password = "root";
$dbname = "dip";
$port = 3360;

$username = $_POST['user'] ?? '';
$password = $_POST['pass'] ?? '';

if ($username && $password) {
    $conn = new mysqli($servername, $db_username, $db_password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please enter both username and password.";
}
?>
