<?php
// filepath: /c:/xampp/htdocs/Personal_Data/db.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "personal_data_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>