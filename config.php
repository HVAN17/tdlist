<?php
$servername = "localhost"; // Địa chỉ server
$username = "root";        // Tên đăng nhập MySQL
$password = "";            // Mật khẩu MySQL
$dbname = "students_db";   // Tên cơ sở dữ liệu

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
