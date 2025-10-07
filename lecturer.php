<?php
class lecturer{
    public $lecturer_id;
    public $name;
    public $email;
    public $department;

    public function __construct($lecturer_id,$name,$email,$department){
        $this->lecturer_id=$lecturer_id;
        $this->name=$name;
        $this->email=$email;
        $this->department=$department;
    }
    // Setters
    public function setName($name) { $this->name = $name; }
    public function setEmail($email) { $this->email = $email; }
    public function setProgram($department) { $this->department = $department; }

    // Getters
    public function getLecturer_id() { return $this->lecturer_id; }
    public function getName() { return $this->name; }
    public function getEmail() { return $this->email; }
    public function getDepartment() { return $this->department; } 
}
?>