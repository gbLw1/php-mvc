<?php

class ErroController
{
	public function index()
	{
		$title = new TitleComponentLeaf("Ops! a página que você está tentando acessar não existe");
		$link = new LinkComponentLeaf(
			text: "Voltar para home",
			linkRedirect: "?pagina=home&metodo=index"
		);

		$errorComponent = new ErrorHandlerComposite();
		$errorComponent->add($title);
		$errorComponent->add($link);
		$errorComponent->display();
	}
}