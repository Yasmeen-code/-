<?php
require 'db.php'; 

$result = "";

if (isset($_POST['emotion'])) {
    $emotion = $_POST['emotion'];

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
<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap');

body {
    font-family: "Cairo", sans-serif;
    background: linear-gradient(120deg, #84fab0, #8fd3f4);
    text-align: center;
    direction: rtl;
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

h1 {
    color: #222;
    margin-bottom: 40px;
    font-size: 36px;
    font-weight: 700;
}

form {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 20px;
    max-width: 600px;
    width: 100%;
}

form button {
    background: linear-gradient(135deg, #4caf50, #2e7d32);
    color: white;
    border: none;
    padding: 20px 0;
    border-radius: 40px;
    cursor: pointer;
    font-size: 20px;
    font-weight: 600;
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

form button::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: rgba(255,255,255,0.2);
    transition: all 0.4s ease;
}

form button:hover::before {
    left: 100%;
}

form button:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
}

form button:active {
    transform: scale(0.95);
}

.message {
    margin-top: 40px;
    background-color: #ffffffcc;
    padding: 25px 40px;
    border-radius: 20px;
    font-size: 24px;
    font-weight: 600;
    color: #333;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    max-width: 600px;
    line-height: 1.6;
    animation: fadeInUp 0.6s ease;
}

@keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}
</style>
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
        <button name="emotion" value="love">❤️ محب</button>
        <button name="emotion" value="tired">😴 مرهق</button>
        <button name="emotion" value="sick">🤒 مريض</button>
        <button name="emotion" value="confident">😎 واثق</button>
        <button name="emotion" value="confused">🤔 حائر</button>
        <button name="emotion" value="proud">🏆 فخور</button>
        <button name="emotion" value="ready">🚀 مستعد</button>
    </form>

    <?php if ($result): ?>
        <div class="message">
            <?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>
</body>
</html>
