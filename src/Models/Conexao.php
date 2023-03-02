<?php

// Classe de conexão com o banco de dados (Singleton)
class Conexao
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=school';
        $username = 'username';
        $password = 'password';
        $this->pdo = new PDO($dsn, $username, $password);
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Conexao();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}