<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$answer_id = $_POST['correct_option'];

$sql = "SELECT * FROM questions WHERE id = $answer_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $answer = $result->fetch_assoc();

    if ($answer['is_correct']) {
        echo "Correct!";
    } else {
        echo "Incorrect!";
    }
} else {
    echo "No answer selected.";
}

$conn->close();
?>
