<?php
// مصفوفة المشاعر مع الرسائل
$messages = [
    "happy" => [
        "الحمد لله الذي بنعمته تتم الصالحات 🌸",
        "ابتسم، فالله يحب المتفائلين 😊"
    ],
    "sad" => [
        "وَلَا تَهِنُوا وَلَا تَحْزَنُوا وَأَنتُمُ الْأَعْلَوْنَ إِن كُنتُم مُّؤْمِنِينَ 🌿",
        "اصبر، فبعد العسر يأتي اليسر 💖"
    ],
    "angry" => [
        "وَالْكَاظِمِينَ الْغَيْظَ وَالْعَافِينَ عَنِ النَّاسِ 🌿",
        "اهدأ، فالغضب من الشيطان 🔥"
    ],
    "broken" => [
        "إِنَّ مَعَ الْعُسْرِ يُسْرًا 🌸",
        "الله معك ولن يتركك 🤍"
    ]
];

$result = "";

// لو المستخدم ضغط على شعور
if (isset($_POST['emotion'])) {
    $emotion = $_POST['emotion'];
    if (isset($messages[$emotion])) {
        // اختيار رسالة عشوائية من المصفوفة
        $result = $messages[$emotion][array_rand($messages[$emotion])];
    }
}
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
    </form>

    <?php if ($result): ?>
        <div class="message">
            <?php echo htmlspecialchars($result, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>
</body>
</html>
