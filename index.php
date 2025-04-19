<?php
session_start();
if (isset($_SESSION['name']) && isset($_SESSION['user_id'])) {
    $username = $_SESSION['name'];
    $user_id = $_SESSION['user_id'];
} else {
    $username = 'Guest';
    $user_id = 'N/A';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mock Test Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            display: flex;
            background-color: #f4f6fc;
        }
        .sidebar {
            width: 250px;
            background: #fff;
            min-height: 100vh;
            padding: 20px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar ul li {
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .sidebar ul li:hover, .sidebar ul li.active {
            background: #6c63ff;
            color: white;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        .section-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .cards-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 220px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .progress-bar {
            height: 5px;
            width: 100%;
            background: #ddd;
            border-radius: 5px;
            margin: 10px 0;
            overflow: hidden;
        }
        .progress {
            height: 100%;
            background: #6c63ff;
            width: 50%;
        }
        .btn {
            display: block;
            padding: 10px;
            background: #6c63ff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 10px;
            transition: background 0.3s;
        }
        .btn:hover {
            background: #554bd2;
        }
        span{
            font-size:medium;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h3><?php echo  $username ?></h3>
        <h4>Uid :<?php echo $user_id ?></h4>
        <ul>
            <li class="active">Dashboard</li>
            <li><a href="cet.php">CET Mock Test</a></li>
            <li><a href="result.php">Results</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="feedback.html">FeedBack</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2 class="section-title">Mock Tests<span> (Score will be stored)</span></h2>
        <div class="cards-container">
            <div class="card">
                <h3>MATHS</h3>
                <div class="progress-bar"><div class="progress" style="width: 80%;"></div></div>
                <a href="maths.php" class="btn">Take Test</a>
            </div>
            <div class="card">
                <h3>PHYSICS</h3>
                <div class="progress-bar"><div class="progress" style="width: 60%;"></div></div>
                <a href="physics.php" class="btn">Take Test</a>
            </div>
            <div class="card">
                <h3>CHEMISTRY</h3>
                <div class="progress-bar"><div class="progress" style="width: 40%;"></div></div>
                <a href="chemistry.php" class="btn">Take Test</a>
            </div>
            <div class="card">
                <h3>ENGLISH</h3>
                <div class="progress-bar"><div class="progress" style="width: 50%;"></div></div>
                <a href="english.php" class="btn">Take Test</a>
            </div>
        </div>
                                <!-- test cards  -->
        <h2 class="section-title" style="margin-top: 20px;">Practice Questions
        <span> (Score will be stored)</span>
        </h2>
        <div class="cards-container">
            <div class="card">
                <h3>Computer Science</h3>
                <div class="progress-bar"><div class="progress" style="width: 50%;"></div></div>
                <a href="computer.php" class="btn">Take Test</a>
            </div>
            <div class="card">
                <h3>Electronics</h3>
                <div class="progress-bar"><div class="progress" style="width: 70%;"></div></div>
                <a href="electronics.php" class="btn">Take Test</a>
            </div>
            <div class="card">
                <h3>Genral Knowledge</h3>
                <div class="progress-bar"><div class="progress" style="width: 20%;"></div></div>
                <a href="gk.php" class="btn">Take Test</a>
            </div>
            <div class="card">
                <h3>Mixed Questins</h3>
                <div class="progress-bar"><div class="progress" style="width: 30%;"></div></div>
                <a href="mix_questions.php" class="btn">Take Test</a>
            </div>
        </div>
    </div>
</body>
</html>
