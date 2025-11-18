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

$planHTML = "";

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
  $userId = $_SESSION['user_id'];

  // Get the latest diet plan for the logged-in user
  $stmt = $conn->prepare("SELECT plan_html FROM diet_plans WHERE user_id = ? ORDER BY id DESC LIMIT 1");
  $stmt->bind_param("i", $userId);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result && $row = $result->fetch_assoc()) {
    $planHTML = $row['plan_html'];
  } else {
    $planHTML = "<p>No diet plan saved yet.</p>";
  }

  $stmt->close();
} else {
  $planHTML = "<p>Please log in to view your diet plan.</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Your Diet Plan</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: 'Segoe UI';
      background: #f5f7fa;
      padding: 20px;
    }

    #plans-container {
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 25px;
      margin-top: 20px;
      max-width: 800px;
      margin: auto;
    }

    #plans-container h4 {
      color: #2c3e50;
      font-size: 1.5rem;
      border-bottom: 2px solid #3498db;
      padding-bottom: 8px;
      margin-bottom: 16px;
    }

    #plans-container ul {
      list-style: none;
      padding: 0;
    }

    #plans-container li {
      background-color: #ecf0f1;
      margin: 10px 0;
      padding: 12px 15px;
      border-left: 5px solid #3498db;
      border-radius: 8px;
    }

    #plans-container li:hover {
      background-color: #dfe6e9;
    }
  </style>
</head>
<body>
  <h2 style="text-align: center;">Your Personalized Diet Plan</h2>
  <div id="plans-container">
    <?php echo $planHTML; ?>
  </div>
</body>
</html>
