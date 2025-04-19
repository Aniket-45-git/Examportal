<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $subject = $_POST['subject'];
    $score = $_POST['score'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $query = "INSERT INTO results (user_id, subject, score, date, time) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("isiss", $user_id, $subject, $score, $date, $time);

    if ($stmt->execute()) {
        echo "Result saved successfully!";
    } else {
        echo "Error saving result: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
