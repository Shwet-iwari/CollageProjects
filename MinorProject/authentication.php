<?php
$host = "localhost";
$user = "root";
$password = '';
$db_name = "shweta";

$con = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $con->prepare("SELECT * FROM userlogin WHERE userID = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_array(MYSQLI_ASSOC);
$count = $result->num_rows;

if ($count == 1) {
    header("Location: cardsection.html");
    exit();
} else {
    echo "<script>
        alert('Login failed. Invalid username or password.');
        window.location.href = 'login.html'; 
      </script>";
}

$stmt->close();
$con->close();
?>