<?php

class Conexao
{
    // Propriedade privada que guarda a instância única da classe Conexao.
    private static $instance;

    // Propriedades de conexão com o banco de dados.
    private $host = 'localhost';
    private $user = 'usuario';
    private $password = 'senha';
    private $database = 'banco_de_dados';

    // Construtor privado para evitar que a classe seja instanciada fora desta.
    private function __construct()
    {
        // Código de inicialização da conexão com o banco de dados.
        // ...
    }

    // Método estático para criar ou obter a instância única da classe Conexao.
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Conexao();
        }
        return self::$instance;
    }

    // Métodos públicos para acesso aos dados da conexão.
    public function getHost()
    {
        return $this->host;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getDatabase()
    {
        return $this->database;
    }
}


?>