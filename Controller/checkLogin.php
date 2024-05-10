<?php
session_start();

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
    if (isset($_POST['submit'])) {
        $username = $_POST['userName'];
        $password = $_POST['passWord'];

        $sql = "SELECT * FROM User WHERE TenUser = :username AND MatKhau = :password";
        $stmt = $db->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);

        $user = $stmt->fetch();

        if ($user) {
            $_SESSION['loggedin'] = true;
            header("Location: ../View/sach.php");
        } else {
            echo "Đăng nhập thất bại!";
            exit;
        }
    } else {
        header('Location: index.php');
        exit;
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
