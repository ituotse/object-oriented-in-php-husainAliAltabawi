<?php
require_once "lecturermanager.php";
$manager = new LecturerManager($pdo); // إنشاء كائن مدير المحاضرين




// إضافة محاضر جديد
if (isset($_POST['add'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['department'])) {
        $lecturer = new Lecturer(null, $_POST['name'], $_POST['email'], $_POST['department']);
        $manager->add($lecturer);
    } else {
        echo "<p style='color:red;'>الرجاء تعبئة جميع الحقول!</p>";
    }
}

// إذا تم النقر على رابط الحذف
if (isset($_GET['delete'])) {
    $manager->delete($_GET['delete']);
}

// جلب جميع المحاضرين من قاعدة البيانات
$lecturers = $manager->getAll();
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title>إدارة المحاضرين</title>
</head>
<body>
    <h2>إضافة محاضر جديد</h2>

    <!-- نموذج إدخال بيانات المحاضر -->
    <form method="POST">
        <input type="text" name="name" placeholder="اسم المحاضر" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="text" name="department" placeholder="القسم" required>
        <button type="submit" name="add">إضافة</button>
    </form>

    <h2>قائمة المحاضرين</h2>

    <!-- جدول عرض جميع المحاضرين -->
    <table border="1" cellpadding="5">
        <tr>
            <th>الرقم</th>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>القسم</th>
            <th>التحكم</th>
        </tr>

        <!-- عرض كل محاضر من قاعدة البيانات -->
        <?php foreach ($lecturers as $lec): ?>
        <tr>
            <td><?= $lec['lecturer_id'] ?></td>
            <td><?= $lec['name'] ?></td>
            <td><?= $lec['email'] ?></td>
            <td><?= $lec['department'] ?></td>
            <td>
                <!-- روابط تعديل وحذف -->
                <a href="edit.php?id=<?= $lec['lecturer_id'] ?>">تعديل</a> |
                <a href="?delete=<?= $lec['lecturer_id'] ?>" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>