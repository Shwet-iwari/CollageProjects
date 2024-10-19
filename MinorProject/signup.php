<?php
$host = "localhost";
$user = "root";
$DBpassword = '';
$db_name = "shweta"; // Database name

// Establish a connection to the database
$con = mysqli_connect($host, $user, $DBpassword, $db_name);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect with MySQL: " . mysqli_connect_error());
}

// Initialize variables
$username = "";
$password = "";
$email = "";

// Retrieve form data using POST method
$username = $_POST['RuserID'];
$password = $_POST['Rpassword'];
$email = $_POST['email'];

// Sanitize user input to prevent SQL injection
$username = mysqli_real_escape_string($con, $username);
$password = mysqli_real_escape_string($con, $password);
$email = mysqli_real_escape_string($con, $email);

// Check if the userID (username) already exists in the database
$check_query = "SELECT * FROM userLogin WHERE userID = '$username'";
$result = mysqli_query($con, $check_query);

if ($result === false) {
    die("Error in query: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    // If userID already exists, show an error
    echo "<script>
                alert('UserID already exists. Please choose a different one.');
                window.location.href = 'signup.html'; 
          </script>";
} else {
    // If userID doesn't exist, proceed with the insertion
   
    // Insert user details into the database
    $sql = "INSERT INTO userLogin (userID, `password`, email) VALUES ('$username', '$password', '$email')";
    if (mysqli_query($con, $sql)) {
        // Redirect to homepage or another page after successful sign-up
        echo "<script>
                    alert('Sign-up successful!');
                    window.location.href = 'login.html'; // Redirect to login page
              </script>";
    } else {
        // Handle errors during insertion
        echo "<script>
                    alert('Error: " . mysqli_error($con) . "');
                    window.location.href = 'signup.html'; 
              </script>";
    }
}

// Close the connection
mysqli_close($con);
?>
