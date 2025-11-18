<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login_process.php");
    exit();
}

// Connect to database
$conn = new mysqli("localhost", "root", "", "wellness_plate");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user name from database
$email = $_SESSION['user'];
$sql = "SELECT name FROM users WHERE email = '$email'";
$result = $conn->query($sql);
$user_name = "Guest";

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $user_name = $row['name'];
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wellness Plate</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/YOUR-FONT-AWESOME-KEY.js" crossorigin="anonymous"></script>
  <style>
    /* Custom styling for welcome area */
    .welcome-message {
      text-align: center;
      padding: 20px;
      background-color: #eafaf1;
      font-size: 20px;
      color: #2c3e50;
    }
    .logout-btn {
      background-color: #e74c3c;
      color: white;
      border: none;
      padding: 8px 14px;
      border-radius: 5px;
      float: right;
      margin: 20px;
      cursor: pointer;
    }
    .logout-btn:hover {
      background-color: #c0392b;
    }
  </style>
</head>
<body>


<div class="welcome-message">
  Welcome, <strong><?php echo htmlspecialchars($user_name); ?></strong>! 🌿
</div>

<!-- Continue with your homepage content below -->
<!-- For example, your "Healthy Cooking Basics" or whatever you had in index.html -->

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        body {
            background-color: #f4f4f4;
            color: #333;
        }
        header {
    background: #fff;
    padding: 10px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
    flex-wrap: nowrap;
}
        .logo {
    font-size: 20px;
    font-weight: bold;
    color: #2c3e50;
    white-space: nowrap;
    flex-shrink: 0;
}
         
button {
    padding: 10px 16px;
    background-color: #3498db;
    color: white;
    font-size: 1rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    white-space: nowrap;
    flex-shrink: 0;
}

button:hover {
    background-color: #2980b9;
}
      nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: nowrap;
    width: 100%;
    gap: 10px;
}
       .nav-links {
    display: flex;
    gap: 15px;
    list-style: none;
    white-space: nowrap;
    flex-shrink: 0;
}

.nav-links li {
    display: inline;
}

.nav-links a {
    text-decoration: none;
    color: #333;
    font-weight: bold;
    font-size: 1rem;
}
        .auth-buttons a {
            text-decoration: none;
            padding: 10px 15px;
            background: #27ae60;
            color: white;
            border-radius: 5px;
            margin-left: 10px;
        }
        #hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 40px;
            background: white;
        }
        .hero-content {
            max-width: 50%;
        }
        .hero-content h1 {
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }
        .hero-content p {
            font-size: 18px;
            margin: 10px 0;
            color: #555;
        }
        .hero-content .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #27ae60;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .hero-content .btn:hover {
            background: #219150;
        }
        .hero-image {
            max-width: 45%;
            border-radius: 10px;
        }
        .section-container {
            padding: 40px;
            background: white;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .section-item {
            padding: 20px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .stress-management {
            background: #ffcc80;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }
        .stress-management .text-content {
            max-width: 50%;
        }
        .stress-management img {
            max-width: 45%;
            border-radius: 10px;
        }
        .healthy-recipes {
            background: #81c784;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }
        .healthy-recipes .text-content {
            max-width: 50%;
        }
        .healthy-recipes img {
            max-width: 45%;
            border-radius: 10px;
        }
        .fitness-basics {
            background: #64b5f6;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
        }
        .fitness-basics .text-content {
            max-width: 50%;
        }
        .fitness-basics img {
            max-width: 45%;
            border-radius: 10px;
        }
        .life-essentials {
            background: #ba68c8;
        }
        .scroll-target {
            padding-top: 20px;
            transition: all 0.5s ease-in-out;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #2c3e50;
            color: white;
            margin-top: 40px;
        }
        form {
    margin-left: 10px;
    flex-shrink: 0;
}

.logout-btn {
    background-color: #27ae60;
}

.logout-btn:hover {
    background-color: #219150;
}

/* Optional @media for fine-tuning */
@media (max-width: 600px) {
    .logo {
        font-size: 18px;
    }

    .nav-links a {
        font-size: 0.9rem;
    }

    button {
        font-size: 0.9rem;
        padding: 8px 12px;
    }
}
    </style>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 20px;
  }

  #plans-container {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 25px;
    margin-top: 20px;
    transition: all 0.3s ease-in-out;
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
    transition: background-color 0.2s ease;
  }

  #plans-container li:hover {
    background-color: #dfe6e9;
  }

  select, #getPlanBtn {
    padding: 10px 14px;
    margin-right: 10px;
    border-radius: 8px;
    border: 1px solid #bdc3c7;
    font-size: 1rem;
    outline: none;
    transition: border 0.3s;
  }

  select:focus, #getPlanBtn:focus {
    border-color: #3498db;
  }

  #getPlanBtn {
    background-color: #3498db;
    color: white;
    cursor: pointer;
    border: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  #getPlanBtn:hover {
    background-color: #2980b9;
  }

  .controls {
    margin-bottom: 20px;
  }

  @media (max-width: 600px) {
    select, #getPlanBtn {
      display: block;
      margin: 10px 0;
      width: 100%;
    }
  }
</style>

</head>

    <header>
    <nav>
        <div class="logo">Wellness Plate</div>
        <ul class="nav-links">
            <li><button onclick="window.location.href='view_plan.php'">View My Diet Plan</button></li>
            <li><a href="healthy-recipes.php">Diet Recipes basics</a></li>
            <li><a href="fitness-basics.php">Fitness</a></li>
        </ul>
        <form action="logout.php" method="post">
            <button class="logout-btn" type="submit">Logout</button>
        </form>
    </nav>
</header>

    <section id="hero">
        <div class="hero-content">
            <h1>Welcome to Wellness Plate</h1>
            <p>Your guide to a healthier lifestyle with expert diet tips and fitness insights.</p>
            <a href="#in-this-section" class="btn">Learn More</a>
        </div>
        <img src="https://i.ibb.co/JwCmPhJj/1.jpg" alt="Healthy Lifestyle" class="hero-image">
    </section>
<div style="max-width: 800px; margin: auto; padding: 20px;">
  <h2 style="text-align: center;">Get Your Personalized Diet Plan</h2>
  <form style="display: flex; flex-direction: column; gap: 15px; margin-top: 20px;">
    <label>
      Goal:
      <select name="goal" style="width: 100%; padding: 10px;">
        <option value="weight loss">Weight Loss</option>
        <option value="weight gain">Weight Gain</option>
      </select>
    </label>
    <label>
      Activity Level:
      <select name="activity" style="width: 100%; padding: 10px;">
        <option value="active">Active</option>
        <option value="moderate">Moderate</option>
        <option value="sedentary">Sedentary</option>
      </select>
    </label>
    <label>
      Food Preference:
      <select name="food" style="width: 100%; padding: 10px;">
        <option value="vegetarian">Vegetarian</option>
        <option value="non vegetarian">Non-Vegetarian</option>
        <option value="vegan">Vegan</option>
      </select>
    </label>
    <button type="button" id="getPlanBtn" style="padding: 12px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">
      Get My Diet Plan
    </button>
    <button type="button" id="savePlanBtn" style="padding: 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
  Save My Diet Plan
</button>
  </form>

  <div id="diet-plan-results" style="margin-top: 30px;">
    <h3>Personalized Diet Plans</h3>
    <p>Select your preferences above to view your personalized plan.</p>
    <div id="plans-container"></div>
  </div>
</div>
  	<section id="in-this-section" class="scroll-target section-container">
    <h2>In This Section</h2>

    <a href="stress-management.php" class="section-item stress-management">
        <div class="text-content">
            <h3>Stress Management</h3>
            <p>Learn effective ways to manage stress for a balanced life.</p>
        </div>
        <img src="https://i.ibb.co/jvwfpQVk/Stress-Management-Logo.png" alt="Stress Management">
    </a>

    <a href="healthy-recipes.php" class="section-item healthy-recipes">
        <div class="text-content">
            <h3>Basic Rules for Healthy Recipes</h3>
            <p>Discover nutritious and delicious recipes for a healthy lifestyle.</p>
        </div>
        <img src="https://i.ibb.co/bjJdvy05/NMD-Tandoori-Chicken-Salad-1x1-1-2000-100151aa95db4c39b4f0f36a21db08f5.jpg" alt="Healthy Recipes">
    </a>

    <a href="fitness-basics.php" class="section-item fitness-basics">
        <div class="text-content">
            <h3>Fitness Basics</h3>
            <p>Understand the essentials of staying active and fit.</p>
        </div>
        <img src="https://i.ibb.co/rfbsS3sY/Fitness-Basics-1.png" alt="Fitness Basics">
    </a>
</section>
<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f5f7fa;
    margin: 0;
    padding: 20px;
  }

  #plans-container {
    background-color: #ffffff;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 25px;
    margin-top: 20px;
    transition: all 0.3s ease-in-out;
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
    transition: background-color 0.2s ease;
  }

  #plans-container li:hover {
    background-color: #dfe6e9;
  }

  select, #getPlanBtn {
    padding: 10px 14px;
    margin-right: 10px;
    border-radius: 8px;
    border: 1px solid #bdc3c7;
    font-size: 1rem;
    outline: none;
    transition: border 0.3s;
  }

  select:focus, #getPlanBtn:focus {
    border-color: #3498db;
  }

  #getPlanBtn {
    background-color: #3498db;
    color: white;
    cursor: pointer;
    border: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  #getPlanBtn:hover {
    background-color: #2980b9;
  }

  .controls {
    margin-bottom: 20px;
  }

  @media (max-width: 600px) {
    select, #getPlanBtn {
      display: block;
      margin: 10px 0;
      width: 100%;
    }
  }
</style>

<script>
  const plans = {
    "weight loss": {
      active: {
        vegetarian: `<h4>Weight Loss - Active - Vegetarian</h4><ul><li><strong>Breakfast:</strong> Oats with almond milk, chia seeds, and berries</li><li><strong>Lunch:</strong> Grilled tofu salad with quinoa and mixed greens</li><li><strong>Dinner:</strong> Lentil soup with steamed vegetables</li><li><strong>Snacks:</strong> Carrot sticks with hummus</li></ul>`,
        "non vegetarian": `<h4>Weight Loss - Active - Non-Vegetarian</h4><ul><li><strong>Breakfast:</strong> Boiled eggs with multigrain toast</li><li><strong>Lunch:</strong> Grilled chicken breast with veggies and brown rice</li><li><strong>Dinner:</strong> Fish curry with a side of sautéed spinach</li><li><strong>Snacks:</strong> Yogurt with seeds</li></ul>`,
        vegan: `<h4>Weight Loss - Active - Vegan</h4><ul><li><strong>Breakfast:</strong> Smoothie bowl with banana, spinach, almond butter</li><li><strong>Lunch:</strong> Chickpea salad with olive oil and herbs</li><li><strong>Dinner:</strong> Steamed broccoli and tofu stir fry with millet</li><li><strong>Snacks:</strong> Roasted seeds and nuts</li></ul>`
      },
      moderate: {
        vegetarian: `<h4>Weight Loss - Moderate - Vegetarian</h4><ul><li><strong>Breakfast:</strong> Smoothie with spinach, banana, flaxseed</li><li><strong>Lunch:</strong> Brown rice with mixed vegetable curry</li><li><strong>Dinner:</strong> Moong dal soup with sautéed greens</li><li><strong>Snacks:</strong> Apple with peanut butter</li></ul>`,
        "non vegetarian": `<h4>Weight Loss - Moderate - Non-Vegetarian</h4><ul><li><strong>Breakfast:</strong> Omelette with vegetables</li><li><strong>Lunch:</strong> Chicken curry with brown rice</li><li><strong>Dinner:</strong> Grilled fish with salad</li><li><strong>Snacks:</strong> Boiled egg</li></ul>`,
        vegan: `<h4>Weight Loss - Moderate - Vegan</h4><ul><li><strong>Breakfast:</strong> Green smoothie with oats</li><li><strong>Lunch:</strong> Vegan wrap with hummus and salad</li><li><strong>Dinner:</strong> Quinoa bowl with roasted vegetables</li><li><strong>Snacks:</strong> Coconut water and nuts</li></ul>`
      },
      sedentary: {
        vegetarian: `<h4>Weight Loss - Sedentary - Vegetarian</h4><ul><li><strong>Breakfast:</strong> Herbal tea and fruit salad</li><li><strong>Lunch:</strong> Vegetable upma with curd</li><li><strong>Dinner:</strong> Bottle gourd soup with multigrain toast</li><li><strong>Snacks:</strong> Roasted chana</li></ul>`,
        "non vegetarian": `<h4>Weight Loss - Sedentary - Non-Vegetarian</h4><ul><li><strong>Breakfast:</strong> Boiled egg and fruit</li><li><strong>Lunch:</strong> Light chicken stew</li><li><strong>Dinner:</strong> Egg white salad</li><li><strong>Snacks:</strong> Buttermilk</li></ul>`,
        vegan: `<h4>Weight Loss - Sedentary - Vegan</h4><ul><li><strong>Breakfast:</strong> Warm lemon water and soaked almonds</li><li><strong>Lunch:</strong> Steamed vegetables and red rice</li><li><strong>Dinner:</strong> Moong dal soup</li><li><strong>Snacks:</strong> Cucumber slices with lemon</li></ul>`
      }
    },
    "weight gain": {
      active: {
        vegetarian: `<h4>Weight Gain - Active - Vegetarian</h4><ul><li><strong>Breakfast:</strong> Peanut butter toast with banana smoothie</li><li><strong>Lunch:</strong> Paneer curry with rice and roti</li><li><strong>Dinner:</strong> Rajma with ghee rice</li><li><strong>Snacks:</strong> Nuts and jaggery</li></ul>`,
        "non vegetarian": `<h4>Weight Gain - Active - Non-Vegetarian</h4><ul><li><strong>Breakfast:</strong> Scrambled eggs with buttered toast</li><li><strong>Lunch:</strong> Chicken biryani with raita</li><li><strong>Dinner:</strong> Mutton curry with paratha</li><li><strong>Snacks:</strong> Cheese cubes and boiled eggs</li></ul>`,
        vegan: `<h4>Weight Gain - Active - Vegan</h4><ul><li><strong>Breakfast:</strong> Avocado toast with nut milk shake</li><li><strong>Lunch:</strong> Lentil curry with rice and avocado salad</li><li><strong>Dinner:</strong> Vegan burger with sweet potato fries</li><li><strong>Snacks:</strong> Nut trail mix and dates</li></ul>`
      },
      moderate: {
        vegetarian: `<h4>Weight Gain - Moderate - Vegetarian</h4><ul><li><strong>Breakfast:</strong> Besan chilla with curd</li><li><strong>Lunch:</strong> Veg pulao with dal fry</li><li><strong>Dinner:</strong> Khichdi with ghee</li><li><strong>Snacks:</strong> Banana and peanut shake</li></ul>`,
        "non vegetarian": `<h4>Weight Gain - Moderate - Non-Vegetarian</h4><ul><li><strong>Breakfast:</strong> Chicken sandwich with fruit juice</li><li><strong>Lunch:</strong> Fish curry with rice</li><li><strong>Dinner:</strong> Egg curry with chapati</li><li><strong>Snacks:</strong> Boiled sweet corn with butter</li></ul>`,
        vegan: `<h4>Weight Gain - Moderate - Vegan</h4><ul><li><strong>Breakfast:</strong> Coconut milk smoothie and toast</li><li><strong>Lunch:</strong> Vegan lentil stew with multigrain roti</li><li><strong>Dinner:</strong> Brown rice and tofu curry</li><li><strong>Snacks:</strong> Roasted chickpeas</li></ul>`
      },
      sedentary: {
        vegetarian: `<h4>Weight Gain - Sedentary - Vegetarian</h4><ul><li><strong>Breakfast:</strong> Boiled potato sandwich</li><li><strong>Lunch:</strong> Paneer bhurji with chapati</li><li><strong>Dinner:</strong> Vegetable paratha with curd</li><li><strong>Snacks:</strong> Dry fruits and milk</li></ul>`,
        "non vegetarian": `<h4>Weight Gain - Sedentary - Non-Vegetarian</h4><ul><li><strong>Breakfast:</strong> Omelette with toast</li><li><strong>Lunch:</strong> Chicken curry with chapati</li><li><strong>Dinner:</strong> Fish fry with rice</li><li><strong>Snacks:</strong> Eggs and banana shake</li></ul>`,
        vegan: `<h4>Weight Gain - Sedentary - Vegan</h4><ul><li><strong>Breakfast:</strong> Peanut butter sandwich</li><li><strong>Lunch:</strong> Rice with dal and sabzi</li><li><strong>Dinner:</strong> Vegan pulao</li><li><strong>Snacks:</strong> Almond milk with dates</li></ul>`
      }
    }
  };

 
  const goalSelect = document.querySelector("select[name='goal']");
  const activitySelect = document.querySelector("select[name='activity']");
  const foodSelect = document.querySelector("select[name='food']");
  const getPlanBtn = document.querySelector("#getPlanBtn");
  const savePlanBtn = document.querySelector("#savePlanBtn");
  const plansContainer = document.getElementById("plans-container");

  let currentPlanHTML = "";

  // Generate plan and show it
  getPlanBtn.addEventListener("click", () => {
    const goal = goalSelect.value.toLowerCase();
    const activity = activitySelect.value.toLowerCase();
    const food = foodSelect.value.toLowerCase();

    const plan = plans[goal]?.[activity]?.[food];
    currentPlanHTML = plan;
    plansContainer.innerHTML = plan || `<p>No plan available for selected combination.</p>`;
  });

  // Save the generated plan to MySQL via PHP
  savePlanBtn.addEventListener("click", () => {
    if (!currentPlanHTML) {
      alert("Please generate a plan first.");
      return;
    }

    const data = {
      goal: goalSelect.value,
      activity: activitySelect.value,
      food: foodSelect.value,
      plan: currentPlanHTML
    };

    fetch("save_plan.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data)
    })
    .then(res => res.text())
    .then(response => {
      alert(response); // "Diet plan saved successfully." or error message
    })
    .catch(err => {
      console.error(err);
      alert("Failed to save plan.");
    });
  });
</script>



    <footer>
        <p>&copy; 2025 Wellness Plate. All Rights Reserved.</p>
    </footer>
</body>
</html>

