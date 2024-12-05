<?php
include 'db.php';

// Lấy danh sách sinh viên từ cơ sở dữ liệu
$sql = "SELECT * FROM students ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Tuổi</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['age']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $row['id'] ?>" class="edit">Chỉnh sửa</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Không có sinh viên nào trong danh sách.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
             <!-- Nút thêm sinh viên mới -->
     <a href="add.php" class="add-button">Thêm mới</a>
</body>
</html>
