<?php
require 'db.php';

$data = [
    ["happy", "الحمد لله الذي بنعمته تتم الصالحات 🌸"],
    ["happy", "ابتسم، فالله يحب المتفائلين 😊"],
    ["sad", "وَلَا تَهِنُوا وَلَا تَحْزَنُوا وَأَنتُمُ الْأَعْلَوْنَ إِن كُنتُم مُّؤْمِنِينَ 🌿"],
    ["sad", "اصبر، فبعد العسر يأتي اليسر 💖"],
    ["angry", "وَالْكَاظِمِينَ الْغَيْظَ وَالْعَافِينَ عَنِ النَّاسِ 🌿"],
    ["angry", "اهدأ، فالغضب من الشيطان 🔥"],
    ["broken", "إِنَّ مَعَ الْعُسْرِ يُسْرًا 🌸"],
    ["broken", "الله معك ولن يتركك 🤍"]
];

foreach ($data as $row) {
    $emotion = $row[0];
    $message = $conn->real_escape_string($row[1]);
    $sql = "INSERT INTO messages (emotion, message) VALUES ('$emotion', '$message')";
    if ($conn->query($sql)) {
        echo "تمت إضافة: $message <br>";
    } else {
        echo "خطأ: " . $conn->error . "<br>";
    }
}

$conn->close();
?>
