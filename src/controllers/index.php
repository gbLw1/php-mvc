<?php

require_once('../models/Database.php');

class Controller {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function index() {
        $query = $this->db->prepare('SELECT * FROM products');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        require_once('../views/index.php');
    }

    public function create() {
        // Implementar a criação de um produto
    }

    public function update() {
        // Implementar a atualização de um produto
    }

    public function delete() {
        // Implementar a exclusão de um produto
    }
}