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
<?php
include 'db_connect.php'; 
$query = "SELECT qid, subject, question, options, correct_option FROM questions WHERE subject='Electronics'";
$result = $conn->query($query);
$questions = [];
while ($row = $result->fetch_assoc()) {
    $row['options'] = json_decode($row['options']); 
    $questions[] = $row;
}
$questions_json = json_encode($questions);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MCQ Test - TestGenius</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f5e6;
            text-align: center;
            margin: 20px;
        }
        .container {
            width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }
        h2 {
            color: #2b6c2b;
        }
        .question {
            font-size: 18px;
            margin: 15px 0;
        }
        .options label {
            display: block;
            padding: 5px;
            border: 1px solid #ddd;
            margin: 5px 0;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }
        .options label:hover {
            background-color: #d1f2d1;
        }
        button {
            padding: 10px 20px;
            background: #2b6c2b;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background: #1f4d1f;
        }
        .result {
            font-size: 20px;
            font-weight: bold;
            color: #2b6c2b;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Electronics Test</h2>
    <div id="quiz-container"></div>
    <button onclick="submitQuiz()">Submit</button>
    <div class="result" id="result"></div>
</div>

<script>
    let questions = <?php echo $questions_json; ?>;
    let quizContainer = document.getElementById("quiz-container");

    function loadQuiz() {
        questions.forEach((q, index) => {
            let questionHTML = `
                <div class="question">${index + 1}. ${q.question}</div>
                <div class="options">
                    ${q.options.map(option => `
                        <label>
                            <input type="radio" name="q${q.qid}" value="${option}"> ${option}
                        </label>
                    `).join("")}
                </div>
            `;
            quizContainer.innerHTML += questionHTML;
        });
    }

    function submitQuiz() {
        let score = 0;
        questions.forEach(q => {
            let selectedOption = document.querySelector(`input[name="q${q.qid}"]:checked`);
            if (selectedOption && selectedOption.value === q.correct_option) {
                score++;
            }
        });

        document.getElementById("result").innerHTML = `You scored ${score} out of ${questions.length}!`;
        
        let date = new Date().toISOString().split('T')[0];  
        let time = new Date().toISOString().split('T')[1].split('.')[0];  
        
        let formData = new FormData();
        formData.append("user_id", <?php echo $user_id; ?>);
        formData.append("subject", 'Electronics');
        formData.append("score", score);
        formData.append("date", date);
        formData.append("time", time);
        
        fetch('save_result.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data); 
        })
        .catch(error => console.error('Error:', error));
    }

    loadQuiz();
</script>

</body>
</html>
