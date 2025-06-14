<?php
// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'hotel';

// Create connection
try {
    $conn = mysqli_connect($host, $username, $password, $database);
    
    if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    
    // Set charset to UTF8
    mysqli_set_charset($conn, "utf8mb4");
    
} catch (Exception $e) {
    die("Database Error: " . $e->getMessage());
}

// Function to close database connection
function closeConnection() {
    global $conn;
    if ($conn) {
        mysqli_close($conn);
    }
}

// Register shutdown function to ensure connection is closed
register_shutdown_function('closeConnection');
?>
