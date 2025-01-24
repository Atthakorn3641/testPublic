<?php
session_start();
include('Database Connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // สืบค้นข้อมูลผู้ใช้งานจากฐานข้อมูล
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // ตรวจสอบรหัสผ่าน
        if (password_verify($password, $user['password'])) {
            // เข้าสู่ระบบสำเร็จ
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Username not found.";
    }
}
?>
