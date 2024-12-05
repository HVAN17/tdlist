<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', $age)";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form method="POST">
        <label>Tên:</label><br>
        <input type="text" name="name" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Tuổi:</label><br>
        <input type="number" name="age" required><br><br>
        <button type="submit">Thêm</button>
    </form>
    <a href="index.php">Quay lại</a>
</body>
</html>
