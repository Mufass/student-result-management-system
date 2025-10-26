<?php
// ===============================
// Database Connection File
// ===============================

// Database configuration
$host = "localhost";        // XAMPP default host
$user = "root";             // XAMPP default username
$pass = "";                 // XAMPP default password (empty by default)
$dbname = "student_result_db"; // Your database name

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Database Connection Failed: " . $conn->connect_error);
} else {
     echo "✅ Database Connected Successfully";
}

// Optional: set character encoding
$conn->set_charset("utf8");

?>
