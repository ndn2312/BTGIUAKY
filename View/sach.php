<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}
$uri = "mysql://avnadmin:AVNS_H-A3C52kI1HzdzQXnXk@mysql-29f2e3e5-giuaky.l.aivencloud.com:10600/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=QUANLYSACH";
$conn .= ";sslmode=verify-ca;sslrootcert='pri/ca.pem'";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);
    $sql = "SELECT * FROM Sach LIMIT 5";
    $stmt = $db->query($sql);
    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">



<body>
    <h2>Danh sách Sách</h2>
    <table>
        <tr>
            <th>Mã Sách</th>
            <th>Tên Sách</th>
            <th>Số Lượng</th>
        </tr>
        <?php
        foreach ($books as $book) {
            echo "<tr>";
            echo "<td>" . $book['MaSach'] . "</td>";
            echo "<td>" . $book['TenSach'] . "</td>";
            echo "<td>" . $book['SoLuong'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
</body>

</html>