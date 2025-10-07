<?php
require_once "lecturermanager.php";
$manager = new LecturerManager($pdo);



// جلب بيانات المحاضر المطلوب تعديله
$lecturerData = $manager->getById($_GET['id']);



// عند إرسال النموذج بعد التعديل
if (isset($_POST['update'])) {
    // إنشاء كائن جديد بالمعلومات المعدلة
    $lecturer = new Lecturer($_GET['id'], $_POST['name'], $_POST['email'], $_POST['department']);
    // تنفيذ عملية التحديث
    $manager->update($lecturer);
    // إعادة التوجيه إلى صفحة القائمة
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>تعديل بيانات المحاضر</title>
</head>
<body>
    <h2>تعديل بيانات المحاضر</h2>

    <!-- نموذج تعديل بيانات المحاضر -->
    <form method="POST">
        <input type="text" name="name" value="<?= $lecturerData['name'] ?>" required>
        <input type="email" name="email" value="<?= $lecturerData['email'] ?>" required>
        <input type="text" name="department" value="<?= $lecturerData['department'] ?>" required>
        <button type="submit" name="update">تحديث</button>
    </form>

    <!-- زر رجوع للقائمة -->
    <a href="index.php">الرجوع للقائمة</a>
</body>
</html>