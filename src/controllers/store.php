<?php

require_once('../models/Database.php');

class Controller {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function store() {
        $query = $this->db->prepare('INSERT INTO products (name, price) VALUES (?, ?)');
        $query->execute([$_POST['name'], $_POST['price']]);
        header('Location: index.php');
    }
}
