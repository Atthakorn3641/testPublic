<?php
$host = "localhost"; // ชื่อโฮสต์
$user = "root"; // ชื่อผู้ใช้
$password = ""; // รหัสผ่าน
$dbname = "my_database"; // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อ
$conn = new mysqli($host, $user, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>