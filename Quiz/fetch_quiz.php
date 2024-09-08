<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM questions ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $question = $result->fetch_assoc();

    $question_id = $question['id'];
    $question_text = $question['question'];

    $answers_sql = "SELECT * FROM questions WHERE qid = $question_id";
    $answers_result = $conn->query($answers_sql);

    $answers = [];

    while($row = $answers_result->fetch_assoc()) {
        $answers[] = [
            'id' => $row['id'],
            'answer' => $row['answer']
        ];
    }

    echo json_encode([
        'question' => $question_text,
        'answers' => $answers
    ]);
} else {
    echo json_encode([]);
}

$conn->close();
?>
