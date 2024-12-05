<?php
include 'db.php';

// Xử lý khi form được gửi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Kiểm tra xem ID đã tồn tại chưa
    $check_sql = "SELECT * FROM students WHERE id = $id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "ID này đã tồn tại. Vui lòng chọn ID khác.";
    } else {
        // Thêm sinh viên mới vào cơ sở dữ liệu
        $sql = "INSERT INTO students (id, name, email, age) VALUES ($id, '$name', '$email', $age)";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php"); // Quay về trang danh sách sinh viên
            exit;
        } else {
            echo "Lỗi: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên mới</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Thêm sinh viên mới</h1>
    <form action="" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required>

        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="age">Tuổi:</label>
        <input type="number" id="age" name="age" required>

        <input type="submit" value="Thêm sinh viên">
    </form>
</body>
</html>
