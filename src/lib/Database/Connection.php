<?php

/*

Singleton Design Pattern

Utilizando padrão singleton para fazer a conexão com banco de dados.
Isso faz com que haja apenas uma instância da classe Connection em todo o app

*/

abstract class Connection
{
	private static $conn;

	public static function getConn()
	{
		// a keyword self é para referenciar variáveis estáticas
		// por ser estática, não é possível chamar através da palavra $this
		if (self::$conn == null) {
			self::$conn = new PDO(
				dsn: 'mysql: host=localhost; dbname=exemplo;',
				username:'root',
				password:'',
				options: array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); // https://www.php.net/manual/en/pdo.error-handling.php
				// ↑ This setting is useful during debugging/testing, if you just want to see what problems occurred without interrupting the flow of the application.
		}

		return self::$conn;
	}
}