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
			self::$conn = new PDO('mysql: host=localhost; dbname=exemplo;', 'root', '');
		}

		return self::$conn;
	}
}