<?php
session_start();
$conn = new mysqli("localhost", "root", "", "wellness_plate");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check that both fields are filled
    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $email = $conn->real_escape_string($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user'] = $email;
                header("Location: index.php");
                exit();
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Please enter both email and password.";
    }

} else {
    echo "Please access this page via the login form.";
}

$conn->close();
?>

