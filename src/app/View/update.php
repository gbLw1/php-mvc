<h1>Alterar Publicação</h1>

<form method="post" action="?pagina=admin&metodo=update">
	<span>Título</span><br>
	<input type="text" name="titulo" value="<?php echo $post->titulo ?>"><br><br>

	<span>Conteúdo</span><br>
	<textarea name="conteudo" cols="25" rows="5"><?php echo $post->conteudo ?></textarea><br><br>

	<input type="hidden" name="id" value="<?php echo $post->id ?>">

	<input type="submit" value="Alterar">
</form>