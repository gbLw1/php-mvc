<?php

/*

A classe Core é que será encarregada de fazer a leitura da url.
irá obter a página que o usuário está acessando
é possível reconhecer a Controller, o Método e os Params que está vindo da rota ou queryString

*/

class Core
{
	public function start($urlGet)
	{
		if (isset($urlGet['metodo'])) {
			$acao = $urlGet['metodo'];
		} else {
			$acao = 'index';
		}

		if (isset($urlGet['pagina'])) {
			$controller = ucfirst($urlGet['pagina'] . 'Controller');
		} else {
			$controller = 'HomeController';
		}


		if (!class_exists($controller)) {
			$controller = 'ErroController';
		}


		if (isset($urlGet['id']) && $urlGet['id'] != null) {
			$id = $urlGet['id'];
		} else {
			$id = null;
		}

		call_user_func_array(array(new $controller, $acao), array($id));
	}
}