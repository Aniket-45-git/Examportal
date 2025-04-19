<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2d3e50;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 50px;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px;
            display: block;
            font-size: 18px;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575d6a;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
        }

        .content h1 {
            color: #2d3e50;
            margin-bottom: 20px;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .button-container button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 10px;
            width: 200px;
        }

        .button-container button:hover {
            background-color: #218838;
        }

        footer {
            background-color: #2d3e50;
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .btn-logout {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2 style="text-align: center;">Admin Dashboard</h2>
        <a href="add_question.php">Add Questions</a>
        <a href="view_results.php">View Results</a>
        <a href="view_users.php">View Users</a>
        <a href="manage_quizzes.php">Manage Quizzes</a>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to the Admin Dashboard</h1>

        <div class="button-container">
            <button onclick="window.location.href='add_questions.php'">Add Questions</button>
            <button onclick="window.location.href='view_results.php'">View Results</button>
            <button onclick="window.location.href='view_users.php'">View Users</button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 TestGenius - All Rights Reserved</p>
    </footer>

</body>
</html>
