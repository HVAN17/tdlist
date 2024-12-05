<?php
$servername = "localhost";
$username = "root"; // Username mặc định của MySQL
$password = "";     // Mật khẩu mặc định trống
$dbname = "students_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
