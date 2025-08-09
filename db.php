<?php
$host = "localhost";
$user = "root"; 
$pass = "";    
$db   = "emotions_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>
