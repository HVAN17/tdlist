<?php
include 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Lỗi: " . $conn->error;
}
?>
