<?php
// Thông tin kết nối đến cơ sở dữ liệu MySQL
$host = "mysql-29f2e3e5-giuaky.l.aivencloud.com"; // Tên máy chủ Aiven
$port = "10600"; // Cổng kết nối
$username = "avnadmin"; // Tên người dùng Aiven MySQL
$password = "AVNS_H-A3C52kI1HzdzQXnXk"; // Mật khẩu Aiven MySQL
$dbname = "defaultdb"; // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $dbname, $port);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}