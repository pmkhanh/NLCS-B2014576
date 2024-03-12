<?php
$servername = "localhost";
$username = "root";
$password = "phamminhkhanh";
$dbname = "shopbook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Kết thành công: " . $conn->connect_error);
}
?>