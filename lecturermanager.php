<?php
require_once "db.php";       // الاتصال بقاعدة البيانات
require_once "lecturer.php"; // تضمين تعريف الكيان Lecturer

// هذا الكلاس مسؤول عن كل العمليات الخاصة بقاعدة البيانات (إضافة، عرض، تعديل، حذف)
class LecturerManager {
    private $pdo; // كائن الاتصال بقاعدة البيانات

    // استلام كائن الاتصال عند إنشاء المدير
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // دالة لإضافة محاضر جديد
    public function add(Lecturer $lecturer) {
        $sql = "INSERT INTO lecturers (  name, email, department) VALUES (:name, :email, :department)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $lecturer->name,
            'email' => $lecturer->email,
            'department' => $lecturer->department
        ]);
    }

    // دالة لجلب جميع المحاضرين من قاعدة البيانات
    public function getAll() {
        $sql = "SELECT * FROM lecturers";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // دالة لجلب محاضر معين حسب رقمه (lecturer_id)
    public function getById($lecturer_id) {
        $sql = "SELECT * FROM lecturers WHERE lecturer_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $lecturer_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // دالة لتحديث بيانات محاضر موجود
    public function update(Lecturer $lecturer) {
        $sql = "UPDATE lecturers SET name = :name, email = :email, department = :department WHERE lecturer_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $lecturer->name,
            'email' => $lecturer->email,
            'department' => $lecturer->department,
            'id' => $lecturer->lecturer_id
        ]);
    }

    // دالة لحذف محاضر بناءً على رقمه
    public function delete($lecturer_id) {
        $sql = "DELETE FROM lecturers WHERE lecturer_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $lecturer_id]);
    }
}
?>