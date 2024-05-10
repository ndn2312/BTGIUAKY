<?php
session_start();
require_once './Model/aivenDbConnection.php';

if (isset($_POST['submit'])) {
    $username = $_POST['userName'];
    $password = $_POST['passWord'];

    $sql = "SELECT * FROM User WHERE TenUser = ? AND MatKhau = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        $_SESSION['loggedin'] = true;
        header('Location: Sach.php');
        exit;
    } else {
        header('Location: index.php');
        exit;
    }
} else {
    // Nếu không có dữ liệu đăng nhập được gửi, chuyển hướng người dùng đến trang đăng nhập lại
    header('Location: index.php');
    exit;
}
