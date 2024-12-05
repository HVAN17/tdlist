<?php
include 'config.php';

// Lấy danh sách sinh viên
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="style.css">
    

</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <a href="add.php">Thêm sinh viên</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Tuổi</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['age'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>">Sửa</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
