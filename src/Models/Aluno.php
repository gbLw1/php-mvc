<?php

class Model
{
    private static $instance;
    private $db;

    private function __construct()
    {
        $this->db = Conexao::getInstance()->getConnection();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Model();
        }

        return self::$instance;
    }

    public function getAllStudents()
    {
        $stmt = $this->db->query('SELECT * FROM students');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addStudent($name, $email, $phone)
    {
        $stmt = $this->db->prepare('INSERT INTO students (name, email, phone) VALUES (:name, :email, :phone)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }

    public function getStudentById($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM students WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStudent($id, $name, $email, $phone)
    {
        $stmt = $this->db->prepare('UPDATE students SET name = :name, email = :email, phone = :phone WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->execute();
    }

    public function deleteStudent($id)
    {
        $stmt = $this->db->prepare('DELETE FROM students WHERE id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}