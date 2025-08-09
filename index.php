<?php
require 'db.php'; // ملف الاتصال بقاعدة البيانات

$result = "";

// لو المستخدم ضغط على شعور
if (isset($_POST['emotion'])) {
    $emotion = $_POST['emotion'];

    // اختيار رسالة عشوائية من قاعدة البيانات
    $sql = "SELECT message FROM messages WHERE emotion = '$emotion' ORDER BY RAND() LIMIT 1";
    $query = $conn->query($sql);

    if ($query && $query->num_rows > 0) {
        $row = $query->fetch_assoc();
        $result = $row['message'];
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>داعمك المعنوي</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>كيف تشعر اليوم؟</h1>
    <form method="POST">
        <button name="emotion" value="happy">😊 سعيد</button>
        <button name="emotion" value="sad">😔 حزين</button>
        <button name="emotion" value="angry">😡 منفعل</button>
        <button name="emotion" value="broken">💔 محطم</button>
        <button name="emotion" value="calm">🕊 مطمئن</button>
        <button name="emotion" value="grateful">🙏 ممتن</button>
        <button name="emotion" value="excited">🚀 متحمس</button>
        <button name="emotion" value="anxious">😟 قلق</button>
    </form>

    <?php if ($result): ?>
        <div class="message">
            <?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>
</body>
</html>
