<?php

class AdminController
{
	public function index()
	{
		try {
			$postagens = Postagem::selecionaTodos();

			require_once "app/View/admin.php";

		} catch (Exception $e) {
			// Implementação do composite pattern utilizado de exemplo
			// Ao estourar uma exception, permite criar componentes (tags) na tela
			// E aproveitando para exibir a mensagem da exception de forma customizada.

			$errorComponent = new ErrorHandlerComposite();
			$errorComponent->handleException($e);

			// criação do título (h1)
			$title = new TitleComponentLeaf("Gerenciador de Conteúdo");

			// criação do link de redirecionamento
			$link = new LinkComponentLeaf(
				linkRedirect: "?pagina=admin&metodo=create",
				text: "Criar publicação");

			// adicionando componentes
			$errorComponent->add($title);
			$errorComponent->add($link);
			$errorComponent->display();
		}

		
		/* --------------------------- ↓ Composer - Twig ↓ -------------------------- */

		// 	$loader = new \Twig\Loader\FilesystemLoader('app/View');
		// 	$twig = new \Twig\Environment($loader);
		// 	$template = $twig->load('admin.html');

		// 	$objPostagens = Postagem::selecionaTodos();

		// 	$parametros = array();
		// 	$parametros['postagens'] = $objPostagens;

		// 	$conteudo = $template->render($parametros);
		// 	echo $conteudo;
	}

	public function create()
	{
		require_once "app/View/create.html";

		
		/* --------------------------- ↓ Composer - Twig ↓ -------------------------- */

		// $loader = new \Twig\Loader\FilesystemLoader('app/View');
		// $twig = new \Twig\Environment($loader);
		// $template = $twig->load('create.html');

		// $parametros = array();

		// $conteudo = $template->render($parametros);
		// echo $conteudo;
	}

	public function insert()
	{
		try {
			Postagem::insert($_POST);

			echo '<script>alert("Publicação inserida com sucesso!");</script>';
			echo '<script>location.href="?pagina=admin&metodo=index"</script>';
		} catch (Exception $e) {
			echo '<script>alert("' . $e->getMessage() . '");</script>';
			echo '<script>location.href="?pagina=admin&metodo=create"</script>';
		}

	}

	public function change($paramId)
	{
		$post = Postagem::selecionaPorId($paramId);

		require_once("app/View/update.php");

		
		/* --------------------------- ↓ Composer - Twig ↓ -------------------------- */

		// $loader = new \Twig\Loader\FilesystemLoader('app/View');
		// $twig = new \Twig\Environment($loader);
		// $template = $twig->load('update.html');

		// $post = Postagem::selecionaPorId($paramId);

		// $parametros = array();
		// $parametros['id'] = $post->id;
		// $parametros['titulo'] = $post->titulo;
		// $parametros['conteudo'] = $post->conteudo;

		// $conteudo = $template->render($parametros);
		// echo $conteudo;
	}

	public function update()
	{
		try {
			Postagem::update($_POST);

			echo '<script>alert("Publicação alterada com sucesso!");</script>';
			echo '<script>location.href="?pagina=admin&metodo=index"</script>';
		} catch (Exception $e) {
			echo '<script>alert("' . $e->getMessage() . '");</script>';
			echo '<script>location.href="?pagina=admin&metodo=change&id=' . $_POST['id'] . '"</script>';
		}
	}

	public function delete($paramId)
	{
		try {
			Postagem::delete($paramId);

			echo '<script>alert("Publicação deletada com sucesso!");</script>';
			echo '<script>location.href="?pagina=admin&metodo=index"</script>';
		} catch (Exception $e) {
			echo '<script>alert("' . $e->getMessage() . '");</script>';
			echo '<script>location.href="?pagina=admin&metodo=index"</script>';
		}

	}
}