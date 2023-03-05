<?php

// A index.php ficará responsável por todos os imports da aplicação

require_once 'app/Core/Core.php';

require_once 'lib/Database/Connection.php';
require_once 'lib/Components/Component.php';
require_once 'lib/Components/ErrorHandlerComponent.php';
require_once 'lib/Components/LinkComponent.php';
require_once 'lib/Components/TitleComponent.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';
require_once 'app/Controller/PostController.php';
require_once 'app/Controller/SobreController.php';
require_once 'app/Controller/AdminController.php';

require_once 'app/Model/Postagem.php';
require_once 'app/Model/Comentario.php';


// require_once 'vendor/autoload.php';


// carrega o template padrão assim que entra na index
$template = file_get_contents('app/Template/estrutura.html');

// ob_start serve para executar um bloco de código
// e com a função ob_get_contents() é possível obter o resultado de toda a saída do navegador
ob_start();
	$core = new Core;
	$core->start($_GET);

	$saida = ob_get_contents();
ob_end_clean();

// procura a string '{{area_dinamica}}' no template e substitui com o conteúdo obtido
$tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
echo $tplPronto;