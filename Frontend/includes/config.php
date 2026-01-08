<?php 
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','drivons');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}

$host = "localhost";
$dbname = "drivons"; // Replace with your actual DB name
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

define('RAZORPAY_KEY_ID', 'rzp_test_cQAe9X6ZXFbIYK');  // Replace with your Razorpay Test Key
define('RAZORPAY_KEY_SECRET', 'XFy7oXnTKKAmWEHvEmqVMCLi');  // Replace with your Razorpay Test Secret


?>