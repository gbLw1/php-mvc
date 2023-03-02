<?php

require_once 'Config/Config.php';

// Classe de conexão com o banco de dados (Singleton)
class Conexao {
    
    private static $instance;
    private $connection;
    
    private function __construct() {
        // Configura a conexão com o banco de dados
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
        $user = DB_USER;
        $password = DB_PASSWORD;
        $this->connection = new PDO($dsn, $user, $password);
    }
    
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
}