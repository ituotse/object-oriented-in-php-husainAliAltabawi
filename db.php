<?php
// معلومات الاتصال بقاعدة البيانات
$host = "localhost";
$dbname = "university";
$username = "root";
$password = "";

try {
    // إنشاء الاتصال باستخدام PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // تفعيل وضع الأخطاء لتظهر في حال حدوث خطأ
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // في حال فشل الاتصال، يتم عرض رسالة الخطأ
    die("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>