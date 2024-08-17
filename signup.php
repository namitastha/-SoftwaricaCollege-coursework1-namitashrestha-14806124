<?php
// Database credentials
$servername = "localhost"; // Your server name
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "dessert_delight"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form inputs
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']); // Collect phone number
    $address = $conn->real_escape_string($_POST['address']); // Collect address
    $password = $conn->real_escape_string($_POST['password']);

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare the SQL statement
    $sql = "INSERT INTO users (username, email, phone, address, password) VALUES ('$username', '$email', '$phone', '$address', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        session_start(); // Start the session before setting session variables
        $_SESSION['username'] = $username; 
        $_SESSION['email'] = $email;
        header("Location: main.html"); // Redirect to the main page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
