<?php
$host = "localhost"; // or your server name
$username = "root"; // your database username
$password = ""; // your database password
$dbname = "simple_attendance_db"; // your database name

// Create connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>