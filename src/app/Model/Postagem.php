<?php

/*

A Model no php usando o design pattern MVC ficará responsável por conectar
e realizar as queries do banco de dados.
Ou seja, é encapsulada toda a regra de negócio na Model

*/

class Postagem
{
	public static function selecionaTodos()
	{
		$con = Connection::getConn();

		$sql = "SELECT * FROM postagem ORDER BY id DESC";
		$sql = $con->prepare($sql);
		$sql->execute();

		$resultado = array();

		// fetchObject faz com que retorne um Objeto<T> e não um array que seria utilizando o fetchAll
		// seria o mesmo que deserializar um json no C# para uma classe T
		// logo, a variável $resultado será um array de Postagem
		while ($row = $sql->fetchObject('Postagem')) {
			$resultado[] = $row;
		}

		if (!$resultado) {
			throw new Exception("Não foi encontrado nenhum registro no banco");
		}

		return $resultado;
	}

	public static function selecionaPorId($idPost)
	{
		$con = Connection::getConn();

		$sql = "SELECT * FROM postagem WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $idPost, PDO::PARAM_INT);
		$sql->execute();

		$resultado = $sql->fetchObject('Postagem');

		if (!$resultado) {
			throw new Exception("Não foi encontrado nenhum registro no banco");
		} else {
			$resultado->comentarios = Comentario::selecionarComentarios($resultado->id);
		}

		return $resultado;
	}

	public static function insert($dadosPost)
	{
		if (empty($dadosPost['titulo']) or empty($dadosPost['conteudo'])) {
			throw new Exception("Preencha todos os campos");
		}

		$con = Connection::getConn();

		$sql = $con->prepare('INSERT INTO postagem (titulo, conteudo) VALUES (:tit, :cont)');
		$sql->bindValue(':tit', $dadosPost['titulo']);
		$sql->bindValue(':cont', $dadosPost['conteudo']);
		$res = $sql->execute();

		if ($res == 0) {
			throw new Exception("Falha ao inserir publicação");
		}

		return true;
	}

	public static function update($params)
	{
		$con = Connection::getConn();

		$sql = "UPDATE postagem SET titsulo = :tit, conteudo = :cont WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':tit', $params['titulo']);
		$sql->bindValue(':cont', $params['conteudo']);
		$sql->bindValue(':id', $params['id']);
		$resultado = $sql->execute();

		if ($resultado == 0) {
			throw new Exception("Falha ao alterar publicação");

			return false;
		}

		return true;
	}

	public static function delete($id)
	{
		$con = Connection::getConn();

		$sql = "DELETE FROM postagem WHERE id = :id";
		$sql = $con->prepare($sql);
		$sql->bindValue(':id', $id);
		$resultado = $sql->execute();

		if ($resultado == 0) {
			throw new Exception("Falha ao deletar publicação");

			return false;
		}

		return true;
	}

}