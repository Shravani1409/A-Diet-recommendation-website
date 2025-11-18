<?php
session_start(); // Start session to access user_id

$host = "localhost";
$user = "root";
$pass = "";
$db = "wellness_plate";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  http_response_code(401); // Unauthorized
  echo "Error: User not logged in.";
  exit();
}

// Decode JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Escape and prepare data
$goal = $conn->real_escape_string($data['goal']);
$activity = $conn->real_escape_string($data['activity']);
$food = $conn->real_escape_string($data['food']);
$plan = $conn->real_escape_string($data['plan']);
$userId = $_SESSION['user_id'];

// Insert the diet plan into the database
$sql = "INSERT INTO diet_plans (user_id, goal, activity_level, food_preference, plan_html)
        VALUES ('$userId', '$goal', '$activity', '$food', '$plan')";

if ($conn->query($sql) === TRUE) {
  echo "Diet plan saved successfully.";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
