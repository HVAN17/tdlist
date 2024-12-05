<?php
include 'db.php';

// Kiểm tra nếu có tham số `id` được truyền
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Lấy ID từ URL

    // Truy vấn lấy thông tin sinh viên theo ID
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc(); // Gán thông tin sinh viên vào biến $student
    } else {
        echo "Không tìm thấy sinh viên với ID này.";
        exit;
    }
} else {
    echo "ID không hợp lệ.";
    exit;
}

// Xử lý cập nhật thông tin khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_id = intval($_POST['id']);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Kiểm tra xem ID mới có trùng với ID nào đã tồn tại (trừ chính ID hiện tại)
    $check_sql = "SELECT * FROM students WHERE id = $new_id AND id != $id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "ID này đã tồn tại. Vui lòng chọn ID khác.";
    } else {
        // Cập nhật thông tin sinh viên, bao gồm cả ID
        $sql = "UPDATE students SET id = $new_id, name='$name', email='$email', age='$age' WHERE id = $id";
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
    <title>Chỉnh sửa sinh viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Chỉnh sửa thông tin sinh viên</h1>
    <form action="" method="post">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" value="<?= htmlspecialchars($student['id']) ?>" required>

        <label for="name">Tên:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>

        <label for="age">Tuổi:</label>
        <input type="number" id="age" name="age" value="<?= htmlspecialchars($student['age']) ?>" required>

        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>
