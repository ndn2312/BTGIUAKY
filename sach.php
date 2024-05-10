<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị sách</title>
</head>

<body>
    <h2>Danh sách 5 sách</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên sách</th>
            <th>Tác giả</th>
            <th>Năm xuất bản</th>
        </tr>
        <?php
        include 'db_connect.php'; // Kết nối đến cơ sở dữ liệu

        // Truy vấn dữ liệu từ bảng sách
        $sql = "SELECT * FROM sach LIMIT 5"; // Lấy 5 bản ghi đầu tiên
        $result = $conn->query($sql);

        // Hiển thị dữ liệu
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["ten_sach"] . "</td>";
                echo "<td>" . $row["tac_gia"] . "</td>";
                echo "<td>" . $row["nam_xuat_ban"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "Không có sách nào trong cơ sở dữ liệu.";
        }
        $conn->close(); // Đóng kết nối
        ?>
    </table>
</body>

</html>