<?php
$servername = "localhost";
$username = "root";  
$password = "";  
$dbname = "shweta";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quesid = $_POST['quesid'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $correct = $_POST['correct'];

    $sql = "INSERT INTO addriddle (quesid, question, option1, option2, option3, option4, correct) 
            VALUES ('$quesid', '$question', '$option1', '$option2', '$option3', '$option4', '$correct')";

    if ($conn->query($sql) === TRUE) {
        echo "New riddle added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
