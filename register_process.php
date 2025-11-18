<?php
// Start session
session_start();

// Connect to database
$conn = new mysqli("localhost", "root", "", "wellness_plate");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Sanitize and collect inputs
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashed password

// Check if email already exists
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Email already registered!";
} else {
    // Insert new user
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        // ✅ Get the newly inserted user ID
        $user_id = $conn->insert_id;

        // ✅ Save user ID and email in session
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user'] = $email;

        header("Location: index.php"); // Redirect to homepage
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
