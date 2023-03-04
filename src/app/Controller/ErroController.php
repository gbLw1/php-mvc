<?php

class ErroController
{
	public function index()
	{
		$title = new TitleComponent("Ops! a página que você está tentando acessar não existe");
		$link = new LinkComponent(
			text: "Voltar para home",
			linkRedirect: "?pagina=home&metodo=index"
		);

		$exHandle = new ExceptionHandlerComponent(
			tags: array(
				$title->display(),
				$link->display()
			)
		);
		
		$exHandle->display();
	}
}