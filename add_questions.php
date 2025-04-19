<?php
// Include database connection
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $options = json_encode([
        $_POST['option1'],
        $_POST['option2'],
        $_POST['option3'],
        $_POST['option4']
    ]);
    $correct_option = $_POST['correct_option'];

    // Prepare SQL statement to insert data into the database
    $query = "INSERT INTO questions (subject, question, options, correct_option) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $subject, $question, $options, $correct_option);

    if ($stmt->execute()) {
        echo "<script>alert('Question added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding question.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Question - Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            padding: 30px;
        }

        .container {
            width: 60%;
            margin: auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #555;
            margin-top: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
        }

        button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
        }

        button:hover {
            background-color: #218838;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .options input {
            width: 80%;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Question</h2>
    <form method="POST" action="dashboard.php">
        
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" required>
        </div>

        <div class="form-group">
            <label for="question">Question</label>
            <textarea id="question" name="question" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="option1">Option 1</label>
            <input type="text" id="option1" name="option1" required>
        </div>
        
        <div class="form-group">
            <label for="option2">Option 2</label>
            <input type="text" id="option2" name="option2" required>
        </div>

        <div class="form-group">
            <label for="option3">Option 3</label>
            <input type="text" id="option3" name="option3" required>
        </div>

        <div class="form-group">
            <label for="option4">Option 4</label>
            <input type="text" id="option4" name="option4" required>
        </div>

        <div class="form-group">
            <label for="correct_option">Correct Option</label>
            <select id="correct_option" name="correct_option" required>
                <option value="option1">Option 1</option>
                <option value="option2">Option 2</option>
                <option value="option3">Option 3</option>
                <option value="option4">Option 4</option>
            </select>
        </div>

        <button type="submit">Add Question</button>
    </form>
</div>

</body>
</html>
