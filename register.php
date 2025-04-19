<?php
session_start(); // Start session at the top before any output
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Check if email already exists
    $check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $result = $check_email->get_result();

    if ($result->num_rows > 0) {
        echo "Email already registered. Try logging in.";
    } else {
        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $password, $role);

        if ($stmt->execute()) {
            // Store session data
            $_SESSION['user_id'] = $stmt->insert_id;
            $_SESSION['name'] = $name;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role == 'teacher') {
                header("Location: teacher_dashboard.php");
            } elseif ($role == 'student') {
                header("Location: index.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TestGenius</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #e6f5e6;
        }

        .container {
            display: flex;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 800px;
            max-width: 100%;
        }

        .left {
            background: #eaf9e6;
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .left img {
            width: 80%;
        }

        .left h2 {
            margin-top: 15px;
            font-size: 24px;
            color: #2b6c2b;
        }

        .left p {
            margin-top: 10px;
            color: #4a4a4a;
            font-size: 14px;
        }

        .right {
            padding: 40px;
            width: 50%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 22px;
            color: #2b6c2b;
        }

        label {
            font-weight: bold;
            font-size: 14px;
            color: #4a4a4a;
            margin-bottom: 5px;
            display: block;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .forgot {
            text-align: right;
            display: block;
            font-size: 12px;
            color: #2b6c2b;
            text-decoration: none;
        }

        .forgot:hover {
            text-decoration: underline;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #2b6c2b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background: #1f4d1f;
        }

        .or {
            text-align: center;
            margin: 15px 0;
            color: #777;
            font-size: 14px;
        }

        .google-signin {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .google-signin img {
            width: 20px;
            margin-right: 10px;
        }

        .google-signin span {
            color: #4a4a4a;
            font-size: 14px;
        }

        .register {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register a {
            color: #2b6c2b;
            text-decoration: none;
            font-weight: bold;
        }

        .register a:hover {
            text-decoration: underline;
        }
        .icon {
            font-family: 'Poppins', sans-serif;
            font-size: 48px;
            font-weight: 700;
            color: #3498db;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="left">
        <img src="https://cdn-icons-png.flaticon.com/512/2010/2010025.png" alt="Exam Mastery">
        <h2 class="icon">Test Genius</h2>
        <p>Unleash Your Academic Success with Test Genius Exam Excellence Platform</p>
    </div>
    <div class="right">
        <h2>Register User</h2>
        <form action="index.php" method="POST">
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Password</label>
            <input type="password" name="password" required>

            <label>Role</label>
            <select name="role">
                <option value="teacher">Teacher</option>
                <option value="student">Student</option>
            </select>

            <button type="submit">Register</button>
        </form>

        <div class="or">or</div>

        <div class="google-signin">
            <img src="c:\Users\LAPTOP_GURU\Downloads\new project\download.png" alt="Google">
            <span>Sign in with Google</span>
        </div>

        <div class="register">
            Already have an account? <a href="login.php">Login</a>
        </div>
    </div>
</div>

</body>
</html>






























