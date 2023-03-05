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

		$errorComponent = new ErrorHandlerComponent();
		$errorComponent->add($title);
		$errorComponent->add($link);
		$errorComponent->display();
	}
}