<?php
// dbcon.php: Database connection

// Start a session (if needed in other files)

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";  // Add your MySQL password if any
$dbname = "drivons";  // Replace with your actual database name

// Create a connection
$con = mysqli_connect('localhost', 'root', '', 'drivons');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

?>