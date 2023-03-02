<?php
require_once "Conexao.class.php";

$conexao = Conexao::getInstance();

// A partir daqui, podemos acessar as propriedades de conexão.
echo "Host: " . $conexao->getHost() . "<br>";
echo "Usuário: " . $conexao->getUser() . "<br>";
echo "Senha: " . $conexao->getPassword() . "<br>";
echo "Banco de dados: " . $conexao->getDatabase() . "<br>";
?>