<?php
include 'config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id = $id";
$result = $conn->query($sql);
$student = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $sql = "UPDATE students SET name='$name', email='$email', age=$age WHERE id=$id";
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
    <title>Sửa thông tin sinh viên</title>
</head>
<body>
    <h1>Sửa thông tin sinh viên</h1>
    <form method="POST">
        <label>Tên:</label><br>
        <input type="text" name="name" value="<?= $student['name'] ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $student['email'] ?>" required><br>
        <label>Tuổi:</label><br>
        <input type="number" name="age" value="<?= $student['age'] ?>" required><br><br>
        <button type="submit">Cập nhật</button>
    </form>
    <a href="index.php">Quay lại</a>
</body>
</html>
