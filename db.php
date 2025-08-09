<?php
$host = "localhost";
$user = "root"; // اسم المستخدم في XAMPP
$pass = "";     // كلمة المرور غالبًا فاضية في XAMPP
$db   = "emotions_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
