<?php
// Start session to manage user sessions
session_start();

// Database connection details
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root";        // Database username
$password = "";            // Database password
$dbname = "project_db";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the entered username and password
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // SQL query to check if the user exists
    $sql = "SELECT * FROM userlogin WHERE username = ?";
    
    // Prepare and bind
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($pass, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION['username'] = $user;
            header("Location: cardsection.html"); // Redirect to the dashboard or another page
            exit;
        } else {
            // Password incorrect
            echo "<script>alert('Invalid password. Please try again.');</script>";
        }
    } else {
        // User not found
        echo "<script>alert('Invalid username. Please try again.');</script>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
