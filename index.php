<?php
require 'db.php';

$result = "";

// لو المستخدم ضغط على شعور
if (isset($_POST['emotion'])) {
    $emotion = $_POST['emotion'];

    // جلب رسالة عشوائية من قاعدة البيانات
    $sql = "SELECT message FROM messages WHERE emotion = ? ORDER BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $emotion);
    $stmt->execute();
    $stmt->bind_result($message);
    if ($stmt->fetch()) {
        $result = $message;
    }
    $stmt->close();
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
        <button name="emotion" value="calm">😌 مطمئن</button>
        <button name="emotion" value="grateful">🙏 ممتن</button>
        <button name="emotion" value="motivated">🚀 متحمس</button>
        <button name="emotion" value="anxious">😟 قلق</button>
    </form>

    <?php if ($result): ?>
        <div class="message">
            <?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>
</body>
</html>
