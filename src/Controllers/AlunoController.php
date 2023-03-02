<?php

class Controller
{
    private $model;

    public function __construct()
    {
        $this->model = Model::getInstance();
    }

    public function index()
    {
        $students = $this->model->getAllStudents();
        include 'views/list.php';
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->model->addStudent($name, $email, $phone);
            header('Location: index.php');
            exit;
        } else {
            include 'views/add.php';
        }
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $this->model->updateStudent($id, $name, $email, $phone);
            header('Location: index.php');
            exit;
        } else {
            $student = $this->model->getStudentById($id);
            include 'views/edit.php';
        }
    }

    public function delete($id)
    {
        $this->model->deleteStudent($id);
        header('Location: index.php');
        exit;
    }
}